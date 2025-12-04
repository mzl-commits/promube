<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BecaSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos la tabla antes de insertar para no duplicar si corres el seeder varias veces
        DB::table('becas')->truncate();

        $becas = [
            // 1. BECA BCP (Información Real)
            [
                'titulo' => 'Beca BCP para Tecsup',
                'tipo' => 'Técnica',
                'nivel' => 'Superior Técnico',
                'modalidad' => 'Presencial',
                'pais' => 'Perú',
                'area' => 'Tecnología',
                'resumen' => 'Financiamiento del 100% de gastos académicos, matrícula y laptop para jóvenes talentosos con pasión por la tecnología en Tecsup.',
                'descripcion' => "La Beca BCP para Tecsup ofrece financiamiento del 100% de los gastos académicos y matrícula, una laptop, y programas de desarrollo de talento y empleabilidad.\n\nEl programa está dirigido a jóvenes con buen rendimiento académico y pasión por la tecnología. La beca cubre la carrera profesional en Tecsup de manera integral (50% BCP y 50% Tecsup), asegurando que el talento no tenga barreras económicas.\n\nPara postular, se deben cumplir los requisitos de la convocatoria, aprobar el examen de admisión de Tecsup y superar la evaluación psicométrica y entrevista personal del BCP.",
                'beneficios' => "• Gastos académicos: 100% de pensiones y matrícula (6 ciclos).\n• Gastos administrativos: Costos de obtención de título.\n• Laptop: Se proporciona un equipo a cada becario.\n• Desarrollo: Programa de talento y empleabilidad.\n• Acompañamiento: Tutoría y seguimiento constante.",
                'url_oficial' => 'https://www.becasbcp.com', 
                'es_destacada' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // 2. Placeholder: Beca Investigación
            [
                'titulo' => 'Beca de Apoyo a la Investigación',
                'tipo' => 'Investigación',
                'nivel' => 'Maestría',
                'modalidad' => 'Mixta',
                'pais' => 'Internacional',
                'area' => 'Ciencias',
                'resumen' => 'Dirigida a estudiantes de maestría que desarrollen proyectos de investigación con alto impacto y relevancia social.',
                'descripcion' => "Este programa impulsa a estudiantes de posgrado que están desarrollando tesis o proyectos de investigación científica.\n\nBuscamos propuestas innovadoras que ofrezcan soluciones a problemas actuales. Los becarios tendrán acceso a laboratorios de alta tecnología y recursos bibliográficos.",
                'beneficios' => "• Financiamiento para materiales y equipo.\n• Estancia de investigación en el extranjero.\n• Publicación de artículos en revistas indexadas.",
                'url_oficial' => 'https://conahcyt.mx/',
                'es_destacada' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 3. Placeholder: Beca Artística
            [
                'titulo' => 'Beca para Talentos Artísticos',
                'tipo' => 'Artística',
                'nivel' => 'Diplomado',
                'modalidad' => 'Presencial',
                'pais' => 'México',
                'area' => 'Artes',
                'resumen' => 'Impulsamos el talento en las artes visuales, música y artes escénicas. Abierta a todos los niveles creativos.',
                'descripcion' => "Esta beca apoya a músicos, pintores, actores y artistas plásticos emergentes.\n\nEl programa incluye la participación en exposiciones, conciertos y talleres impartidos por artistas de renombre nacional e internacional.",
                'beneficios' => "• Pago de colegiaturas en conservatorios.\n• Materiales para producción artística.\n• Espacios para exposiciones.",
                'url_oficial' => 'https://inba.gob.mx/',
                'es_destacada' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 4. Placeholder: Beca Emprendimiento
            [
                'titulo' => 'Beca de Liderazgo y Emprendimiento',
                'tipo' => 'Emprendimiento',
                'nivel' => 'Posgrado',
                'modalidad' => 'Virtual',
                'pais' => 'Latinoamérica',
                'area' => 'Negocios',
                'resumen' => 'Buscamos a los líderes del mañana. Para estudiantes con proyectos innovadores de alto impacto.',
                'descripcion' => "Diseñada para emprendedores visionarios que desean llevar sus ideas al siguiente nivel.\n\nOfrece apoyo económico, programa intensivo de incubación de empresas, asesoría legal y conexión con inversionistas.",
                'beneficios' => "• Capital semilla para el proyecto.\n• Mentoría con CEOs exitosos.\n• Acceso a espacios de coworking.",
                'url_oficial' => 'https://www.inadem.gob.mx/',
                'es_destacada' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 5. Placeholder: Beca Deportiva
            [
                'titulo' => 'Beca para Deportistas',
                'tipo' => 'Deportiva',
                'nivel' => 'Licenciatura',
                'modalidad' => 'Presencial',
                'pais' => 'México',
                'area' => 'Deportes',
                'resumen' => 'Apoyamos a atletas que combinan su carrera deportiva con la excelencia académica.',
                'descripcion' => "Esta beca ofrece flexibilidad académica y recursos para que los atletas puedan entrenar, competir y estudiar sin tener que renunciar a ninguna de sus pasiones.",
                'beneficios' => "• Beca académica del 100%.\n• Nutriólogo y fisioterapeuta personalizado.\n• Apoyo para viajes a competencias.",
                'url_oficial' => 'https://www.gob.mx/conade',
                'es_destacada' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('becas')->insert($becas);
    }
}