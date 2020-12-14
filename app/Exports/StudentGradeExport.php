<?php

namespace App\Exports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\Storage;
use App\Models\Assign_user_rol;
use App\Models\User;
use App\Models\Person;
use App\Models\Assign_student_grade;
use App\Models\logs;
use RegistersEventListeners;
use App\Models\grade;
class StudentGradeExport implements WithEvents,ShouldAutoSize,WithCalculatedFormulas
{

 protected $id;
 function __construct($id) {
        $this->id = $id;
        
 }
  public function collection()
  {
    
      $models=[];
      $year = date("Y");
        $rols = Assign_user_rol::where(['Rol_id'=>2,'State'=>'Active'])->get();
        foreach ($rols as $rol)
        {
            $user = User::find($rol->user_id);
            $student = Person::find($user->Person_id);
            $assigns = Assign_student_grade::where(['User_id'=>$user->id,'Year'=>$year,'State'=>'Active'])->get('Grade_id');
            foreach ($assigns as $assign)
            {
                $conection = logs::where(['Type'=>'Login','User_Id'=>$user->name])->orderby('created_at','DESC')->take(1)->first();
                if($conection)
                {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($conection->created_at));	
                    $mes = strftime("%d de %B del %Y", strtotime($newDate));
                    $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
                }
                $grade = grade::find($assign->Grade_id);
                $query = [
                    'id' => $student->id,
                    'name' => $student->Names,
                    'lastname' => $student->LastNames,
                    'phone' => $student->Phone,
                    'user' => $user->name,
                    'email' => $user->email,
                    'grade' => $grade->GradeNamePeriod(),
                    'conexion' => $conection ?? 'El usuario no se ha conectado'
                ];
                array_push($models,$query);
            }
        }
      return $models;
  }
    public function registerEvents(): array
    {
      return [
         BeforeExport::class => function(BeforeExport $event){
            $event->writer->reopen(new \Maatwebsite\Excel\Files\LocalTemporaryFile(Storage::path('StudentList.xlsx')),Excel::XLSX);
            $event->writer->getSheetByIndex(0);
            $models = [];
            $grade = grade::find($this->id);
            $year = date("Y");
            $rols = Assign_user_rol::where(['Rol_id'=>2,'State'=>'Active'])->get();
            $event->getWriter()->getSheetByIndex(0)->setCellValue('E6',("Listado de alumnos de ".$grade->GradeNamePeriod()));
            foreach ($rols as $rol)
            {
                $user = User::find($rol->user_id);
                $student = Person::find($user->Person_id);
                $assigns = Assign_student_grade::where(['User_id'=>$user->id,'Year'=>$year,'State'=>'Active','Grade_id'=>$grade->id])->get('Grade_id');
                foreach ($assigns as $key => $assign)
                {
                    $conection = logs::where(['Type'=>'Login','User_Id'=>$user->name])->orderby('created_at','DESC')->take(1)->first();
                    if($conection)
                    {
                        setlocale(LC_TIME, "spanish");
                        $newDate = date("d-m-Y", strtotime($conection->created_at));    
                        $mes = strftime("%d de %B del %Y", strtotime($newDate));
                        $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
                    }
                    $grade = grade::find($assign->Grade_id);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('B'.(11+$key),(1+$key));
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('C'.(11+$key),$student->Names);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('D'.(11+$key),$student->LastNames);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('E'.(11+$key),$student->Phone);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('F'.(11+$key),$user->name);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('G'.(11+$key),$user->email);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('H'.(11+$key),$grade->GradeName());
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('I'.(11+$key),$grade->Period()->Name);
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('J'.(11+$key),$conection ?? 'El usuario no se ha conectado');
                }
            }              
            $event->getWriter()->getSheetByIndex(0)->autoSize();
            return $event->getWriter()->getSheetByIndex(0);
                    
        }
      ];
    } 
    
}
