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
use App\Models\Asign_teacher_course;
use App\Models\logs;
use RegistersEventListeners;
use App\Models\course;

class TeacherExport implements WithEvents,ShouldAutoSize,WithCalculatedFormulas
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $usuario_rol = Assign_user_rol::where([['Rol_id',3],['State','Active']])->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
            // $curses = User::find($v->user_id)->CoursesTeacher();
            $curses = Asign_teacher_course::where([['user_id',$v->user_id],['State','Active']])->get();
            $dataT = [];
            foreach ($curses as $value) {
                $curso = course::find($value->Course_id);
                $dataC = [
                    'Curso' => $curso->Name." - ".$curso->Grade()->GradeNamePeriod(),
                ];
                array_push($dataT,$dataC);
            }
            $conection = logs::where(['Type'=>'Login','User_Id'=>$usuario->name])->orderby('created_at','DESC')->take(1)->first();
                if($conection)
                {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($conection->created_at));	
                    $mes = strftime("%d de %B del %Y", strtotime($newDate));
                    $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
                }
            $data = [
                'Id' => $persona->id,
                'Name' => $persona->Names,
                'Apellido' => $persona->LastNames,
                'Telefono' => $persona->Phone,
                'Usuario' => $usuario->name,
                'Correo' => $usuario->email,
                'Curses' => $dataT,
                'Conection' => $conection ?? 'El usuario no se ha conectado'
            ];
            array_push($Models,$data);
        }
        return $Models;
    }
    public function registerEvents(): array
    {
      return [
         BeforeExport::class => function(BeforeExport $event){
            $event->writer->reopen(new \Maatwebsite\Excel\Files\LocalTemporaryFile(Storage::path('TeacherList.xlsx')),Excel::XLSX);
            $event->writer->getSheetByIndex(0);
            $usuario_rol = Assign_user_rol::where([['Rol_id',3],['State','Active']])->get('user_id');
            foreach ($usuario_rol as $key => $v) {
                $usuario = User::find($v->user_id);
                $persona = Person::find($usuario->Person_id);
                //$curses = User::find($v->user_id)->CoursesTeacher();
                $curses = Asign_teacher_course::where([['user_id',$v->user_id],['State','Active']])->get();
                $dataT = "";
                foreach ($curses as $value) {
                    $curso = course::find($value->Course_id);
                    $dataT =  $dataT." ".$curso->Name." - ".$curso->Grade()->GradeNamePeriod();
                   
                }
                $conection = logs::where(['Type'=>'Login','User_Id'=>$usuario->name])->orderby('created_at','DESC')->take(1)->first();
                    if($conection)
                    {
                        setlocale(LC_TIME, "spanish");
                        $newDate = date("d-m-Y", strtotime($conection->created_at));	
                        $mes = strftime("%d de %B del %Y", strtotime($newDate));
                        $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
                    }
                $event->getWriter()->getSheetByIndex(0)->setCellValue('B'.(11+$key),(1+$key));
                $event->getWriter()->getSheetByIndex(0)->setCellValue('C'.(11+$key),$persona->Names);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('D'.(11+$key),$persona->LastNames);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('E'.(11+$key),$persona->Phone);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('F'.(11+$key),$usuario->name);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('G'.(11+$key),$usuario->email);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('H'.(11+$key),$dataT);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('I'.(11+$key),$conection ?? 'El usuario no se ha conectado');
            }
            $event->getWriter()->getSheetByIndex(0)->autoSize();
            return $event->getWriter()->getSheetByIndex(0);
            
        }
      ];
    } 
}
