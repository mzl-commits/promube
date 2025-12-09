<?php

namespace Database\Seeders;

use App\Models\Beca;
use Illuminate\Database\Seeder;

class BecaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BECA BCP (la que ya tienes maquetada)
        Beca::create([
            'nombre'          => 'Beca BCP',
            'slug'            => 'beca-bcp',
            'imagen_portada'  => 'img/becas/beca-bcp.png',
            'banner'          => 'img/becas/beca-bcp.png',
            'titulo'          => 'Postula y potencia tu talento',
            'subtitulo'       => 'Un programa integral del BCP diseñado para jóvenes sobresalientes con recursos limitados.',
            'descripcion'     => "El programa Beca BCP – Carreras Universitarias ofrece la oportunidad única de estudiar una carrera profesional en las mejores universidades del país.\n\nNo es solo una ayuda económica; es un compromiso con tu desarrollo. Busca jóvenes con vocación de servicio, liderazgo y ganas de impactar positivamente en su comunidad.",
            'beneficios'      => [
                [
                    'icon'        => 'school',
                    'titulo'      => 'Cobertura Académica Total',
                    'descripcion' => 'Pensiones y matrículas cubiertas al 100% durante toda la carrera, según las condiciones del programa.',
                ],
                [
                    'icon'        => 'laptop_mac',
                    'titulo'      => 'Herramientas Digitales',
                    'descripcion' => 'Acceso a laptop y recursos tecnológicos para estudiar sin limitaciones.',
                ],
                [
                    'icon'        => 'rocket_launch',
                    'titulo'      => 'Desarrollo de Talento',
                    'descripcion' => 'Talleres, mentorías y espacios formativos para fortalecer tus habilidades blandas y liderazgo.',
                ],
                [
                    'icon'        => 'support_agent',
                    'titulo'      => 'Acompañamiento Constante',
                    'descripcion' => 'Soporte académico y emocional durante toda tu formación profesional.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Registro Online',
                    'descripcion' => 'Completa el formulario oficial con tus datos personales, académicos y socioeconómicos.',
                ],
                [
                    'titulo'      => 'Evaluación',
                    'descripcion' => 'Revisión de requisitos, historial académico y situación económica familiar.',
                ],
                [
                    'titulo'      => 'Entrevista Final',
                    'descripcion' => 'Entrevista personal para conocer tu historia, motivación y proyecto de vida.',
                ],
            ],
        ]);

        // 2. BECA 18
        Beca::create([
            'nombre'          => 'Beca 18',
            'slug'            => 'beca-18',
            'imagen_portada'  => 'img/becas/beca-18.png',
            'banner'          => 'img/becas/beca-18.png',
            'titulo'          => 'Oportunidad para talentos de todo el país',
            'subtitulo'       => 'Dirigida a jóvenes de alto rendimiento académico en condición de vulnerabilidad.',
            'descripcion'     => "Beca 18 es un programa estatal que financia los estudios superiores de jóvenes peruanos con talento y recursos económicos limitados.\n\nPermite acceder a universidades e institutos de calidad en diversas regiones del país.",
            'beneficios'      => [
                [
                    'icon'        => 'payments',
                    'titulo'      => 'Cobertura integral',
                    'descripcion' => 'Financiamiento de matrícula, pensiones, alimentación, movilidad local y materiales de estudio.',
                ],
                [
                    'icon'        => 'home',
                    'titulo'      => 'Alojamiento',
                    'descripcion' => 'Apoyo en residencia o subvención para estudiantes que deben trasladarse de región.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Postulación en línea',
                    'descripcion' => 'Registro en la plataforma oficial según cronograma de PRONABEC.',
                ],
                [
                    'titulo'      => 'Evaluación y preselección',
                    'descripcion' => 'Validación de requisitos, rendimiento académico y condición socioeconómica.',
                ],
                [
                    'titulo'      => 'Asignación de la beca',
                    'descripcion' => 'Publicación de resultados y confirmación de institución educativa elegida.',
                ],
            ],
        ]);

        // 3. BECA TECSUP
        Beca::create([
            'nombre'          => 'Beca Tecsup',
            'slug'            => 'beca-tecsup',
            'imagen_portada'  => 'img/becas/beca-tecsup.png',
            'banner'          => 'img/becas/beca-tecsup.png',
            'titulo'          => 'Estudia carreras técnicas de alta demanda',
            'subtitulo'       => 'Beca orientada a jóvenes que buscan formación tecnológica aplicada.',
            'descripcion'     => "La Beca Tecsup brinda acceso a programas técnicos con alta empleabilidad, en áreas como ingeniería, tecnología y gestión.\n\nEstá enfocada en estudiantes con interés por la innovación y el desarrollo tecnológico.",
            'beneficios'      => [
                [
                    'icon'        => 'engineering',
                    'titulo'      => 'Formación tecnológica',
                    'descripcion' => 'Carreras alineadas a las necesidades actuales de la industria.',
                ],
                [
                    'icon'        => 'work',
                    'titulo'      => 'Empleabilidad',
                    'descripcion' => 'Acompañamiento para prácticas preprofesionales y vinculación con empresas.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Inscripción',
                    'descripcion' => 'Registro en la página oficial de Tecsup o a través de convenios.',
                ],
                [
                    'titulo'      => 'Evaluación',
                    'descripcion' => 'Pruebas de conocimiento y revisión de perfil académico.',
                ],
                [
                    'titulo'      => 'Admisión',
                    'descripcion' => 'Confirmación de vacante y firma de compromiso de becario.',
                ],
            ],
        ]);

        // 4. BECA FERREYROS
        Beca::create([
            'nombre'          => 'Beca Ferreyros',
            'slug'            => 'beca-ferreyros',
            'imagen_portada'  => 'img/Beca-Ferreyros.png',
            'banner'          => 'img/Beca-Ferreyros.png',
            'titulo'          => 'Impulsa tu futuro en el sector industrial',
            'subtitulo'       => 'Dirigida a jóvenes que desean especializarse en mantenimiento, maquinaria y operaciones.',
            'descripcion'     => "La Beca Ferreyros está enfocada en la formación de talento técnico vinculado al sector de maquinaria pesada e industria.\n\nCombina formación académica y experiencia práctica.",
            'beneficios'      => [
                [
                    'icon'        => 'precision_manufacturing',
                    'titulo'      => 'Formación especializada',
                    'descripcion' => 'Programas orientados a maquinaria pesada, mantenimiento y operación.',
                ],
                [
                    'icon'        => 'handshake',
                    'titulo'      => 'Vínculo con empresa líder',
                    'descripcion' => 'Posibilidad de realizar prácticas en Ferreyros u otras empresas del grupo.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Postulación',
                    'descripcion' => 'Envío de datos personales, académicos y carta de motivación.',
                ],
                [
                    'titulo'      => 'Evaluación técnica',
                    'descripcion' => 'Pruebas de aptitud e interés en el sector industrial.',
                ],
                [
                    'titulo'      => 'Selección',
                    'descripcion' => 'Publicación de becarios seleccionados y asignación de programa.',
                ],
            ],
        ]);

        // 5. BECA UNI
        Beca::create([
            'nombre'          => 'Beca UNI',
            'slug'            => 'beca-uni',
            'imagen_portada'  => 'img/becas/beca-uni.png',
            'banner'          => 'img/becas/beca-uni.png',
            'titulo'          => 'Excelencia académica en ingeniería y ciencias',
            'subtitulo'       => 'Dirigida a estudiantes con alto rendimiento que buscan formarse en la UNI.',
            'descripcion'     => "Beca UNI apoya a estudiantes talentosos para que puedan estudiar carreras de ingeniería, arquitectura y ciencias en una de las universidades más reconocidas del país.\n\nBusca potenciar perfiles con alto rendimiento y vocación científica.",
            'beneficios'      => [
                [
                    'icon'        => 'science',
                    'titulo'      => 'Entorno académico exigente',
                    'descripcion' => 'Acceso a laboratorios, proyectos de investigación y docentes especializados.',
                ],
                [
                    'icon'        => 'groups',
                    'titulo'      => 'Red de contactos',
                    'descripcion' => 'Convivencia con estudiantes y egresados destacados en diversas áreas.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Admisión UNI',
                    'descripcion' => 'Participación en el examen de admisión y logro de una vacante.',
                ],
                [
                    'titulo'      => 'Postulación a beca',
                    'descripcion' => 'Registro como ingresante y presentación de requisitos socioeconómicos.',
                ],
                [
                    'titulo'      => 'Asignación de beneficio',
                    'descripcion' => 'Evaluación y otorgamiento de la beca según los cupos disponibles.',
                ],
            ],
        ]);
    }
}
