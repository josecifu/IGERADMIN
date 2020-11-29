<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $LevelList=[];

        $courses=[];
        $Activities =[];
        $Grades =[];
        
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Lecto Escritura",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Cálculo Matemático",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Primero y Segundo",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);



        $courses=[];
        $Activities =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Lenguaje",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Naturales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Formación Humana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Tercero y Cuarto",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);   



        $courses=[];
        $Activities =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Lenguaje",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Naturales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Formación Humana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Quinto y Sexto",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);   


        $Level=[
                "Name"=>"Primaria",
                "Grade"=>$Grades
        ];
        array_push($LevelList,$Level);

        //BÁSICO
        //PRIMERO
        $courses=[];
        $Activities =[];
        $Grades =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Comunicación y Lenguaje",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Idiomas Mayas",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Inglés",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Pensamiento Computacional",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Naturales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales y Formación Ciudadana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Artes Plásticas",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Diplomado Emprender con Éxito",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        
        $Grade =[
            "Grade"=>"Primero",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);   

            //SEGUNDO
        $courses=[];
        $Activities =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Comunicación y Lenguaje",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Idiomas Mayas",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Inglés",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Pensamiento Computacional",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Naturales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales y Formación Ciudadana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Formación Musical",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Productividad y Desarrollo",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Educación Física",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Segundo",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);     

        //Tercero
        $courses=[];
        $Activities =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Comunicación y Lenguaje",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Idiomas Mayas",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Inglés",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Pensamiento Computacional",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Naturales",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales y Formación Ciudadana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Expresión Artistica",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Productividad y Desarrollo",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Educación Física",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Tercero",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);  

        $Level=[
            "Name"=>"Básico",
            "Grade"=>$Grades
        ];
        array_push($LevelList,$Level);

        //Diversificado
        //cuarto
        $courses=[];
        $Activities =[];
        $Grades =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Lengua y Literatura",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Inglés",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Diplomado Emprender con Éxito",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Tecnología de la Información y Comunicación",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática Financiera",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Física",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Organización y Administración",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Contabilidad General y de Sociedades Mercantiles",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales y Formación Ciudadana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Educación Física",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Contabilidad Especializada",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Filosofía",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Psicología",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Cuarto en Ciencias y Letras con Orientación en Gestión Administrativa y Contable",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);   

        //Quinto
        $courses=[];
        $Activities =[];
        $Act =[
            "Name"=>"Primer Semestre",    
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $Act =[
            "Name"=>"Segundo Semestre",
            "Score"=>"50"
        ];
        array_push($Activities,$Act);
        $course = [
            "Name"=>"Lengua y Literatura",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Inglés",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Diplomado Emprender con Éxito",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Tecnología de la Información y Comunicación",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Matemática",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Química",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ciencias Sociales y Formación Ciudadana",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Organización y Administración",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Contabilidad de Costos",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Principios de Auditoría",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Legislación Tributaria",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Biología",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Estadística Descriptiva",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Ética Profesional",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Expresión Artística",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Seminario",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $course = [
            "Name"=>"Práctica Supervisada",
            "Activities"=>$Activities,
            ];
        array_push($courses,$course);
        $Grade =[
            "Grade"=>"Quinto en Ciencias y Letras con Orientación en Gestión Administrativa y Contable",
            "Courses"=>$courses
            ];
        array_push($Grades,$Grade);  


        $Level=[
            "Name"=>"Bachillerato",
            "Grade"=>$Grades
        ];
        array_push($LevelList,$Level);
        $periodsList = ["13-01-001 (Viernes IGER)","13-01-004 (Sábados IGER)","13-01-006 (Domingos MA)","13-01-019 (Domingos IGER)"];
        foreach ($periodsList as $key => $period) {
            $idPeriod = DB::table('periods')->insertGetId([
                'Name' => $period,
                'State' => 'Active',       
            ]);
            foreach ($LevelList as $value) {
                $insert=false;
                if($key==0 && $value['Name'] =="Básico")
                {
                    $insert=true;
                }
                if($key==1)
                {
                    $insert=true;
                }
                if($key==2 && $value['Name'] =="Básico")
                {
                    $insert=true;
                }
                if($key==3 && ($value['Name'] =="Básico" || $value['Name'] =="Primaria"))
                {
                    $insert=true;
                }
                if($insert)
                {
                    $id = DB::table('levels')->insertGetId([
                        'Name' => $value['Name'],
                        'Period_id' =>  $idPeriod,
                        'State' => 'Active',       
                    ]);
                        foreach ($value['Grade'] as $key => $grade) {
                            $idGrade =DB::table('grades')->insertGetId([
                                'Name' => $grade['Grade'],
                                'Level_id' => $id,
                                'State' => 'Active',       
                            ]);
                            foreach($grade['Courses'] as $course)
                            {
                                    $idCourse =DB::table('courses')->insertGetId([
                                        'Name' => $course['Name'],
                                        'Grade_id' => $idGrade,
                                        'State' => 'Active',       
                                    ]);
                                    foreach($course['Activities'] as $activity)
                                    {
                                        $idActivity =DB::table('assign_activities')->insertGetId([
                                            'Name' => $activity['Name'],
                                            'Course_id' => $idCourse,
                                            'Score' => $activity['Score'],
                                            'State' => 'Active',       
                                        ]);
                                    }
                            }
                    }   
                }
            }
        }
    }
}
