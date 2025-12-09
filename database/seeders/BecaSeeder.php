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
            'subtitulo'       => 'Dirigida a jóvenes de alto rendimiento académico en condición de vulnerabilidad, administrada por PRONABEC.',
            'descripcion'     => "Beca 18 es un programa del Estado peruano que financia estudios superiores de jóvenes con buen rendimiento académico y escasos recursos económicos.\n\nPermite acceder a universidades, institutos y escuelas superiores de calidad en distintas regiones del país, priorizando a quienes se encuentran en situación de pobreza, pobreza extrema o en contextos especiales (VRAEM, frontera, población indígena, etc.).",
            'beneficios'      => [
                [
                    'icon'        => 'payments',
                    'titulo'      => 'Cobertura integral de estudios',
                    'descripcion' => 'Financiamiento de matrícula, pensiones, derechos académicos y costos de titulación en una institución elegible.',
                ],
                [
                    'icon'        => 'restaurant',
                    'titulo'      => 'Manutención mensual',
                    'descripcion' => 'Subsidio para alimentación, movilidad local y otros gastos de vida mientras dure la beca, según la modalidad.',
                ],
                [
                    'icon'        => 'home',
                    'titulo'      => 'Alojamiento y transporte',
                    'descripcion' => 'Apoyo en alojamiento o residencias estudiantiles y, cuando corresponde, pasajes interprovinciales al inicio y fin del periodo académico.',
                ],
                [
                    'icon'        => 'diversity_3',
                    'titulo'      => 'Acompañamiento y bienestar',
                    'descripcion' => 'Tutoría, seguimiento académico, orientación vocacional y soporte psicosocial brindado por PRONABEC.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Registro en plataforma PRONABEC',
                    'descripcion' => 'Crear una cuenta, elegir la convocatoria de Beca 18 y completar los datos personales y académicos.',
                ],
                [
                    'titulo'      => 'Carga de documentos',
                    'descripcion' => 'Subir constancias de notas, documentos de identidad e información socioeconómica requerida.',
                ],
                [
                    'titulo'      => 'Evaluación y preselección',
                    'descripcion' => 'Validación de requisitos, orden de mérito y verificación de la condición socioeconómica del postulante.',
                ],
                [
                    'titulo'      => 'Asignación de beca y matrícula',
                    'descripcion' => 'Publicación de seleccionados, elección de institución elegible y matricula como becario.',
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
            'descripcion'     => "La Beca Tecsup brinda acceso a programas técnicos con alta empleabilidad, en áreas como ingeniería, tecnología, diseño y gestión.\n\nLas convocatorias ofrecen coberturas parciales o totales de la pensión, y están dirigidas a jóvenes con interés por la innovación, la tecnología y el desarrollo industrial.",
            'beneficios'      => [
                [
                    'icon'        => 'engineering',
                    'titulo'      => 'Formación tecnológica',
                    'descripcion' => 'Carreras alineadas a la demanda de la industria, con enfoque práctico y proyectos reales.',
                ],
                [
                    'icon'        => 'science',
                    'titulo'      => 'Laboratorios modernos',
                    'descripcion' => 'Uso de talleres, laboratorios y equipamiento especializado para el aprendizaje práctico.',
                ],
                [
                    'icon'        => 'work',
                    'titulo'      => 'Alta empleabilidad',
                    'descripcion' => 'Acompañamiento para prácticas preprofesionales, bolsa de trabajo y vínculos con empresas aliadas.',
                ],
                [
                    'icon'        => 'workspace_premium',
                    'titulo'      => 'Certificaciones y habilidades blandas',
                    'descripcion' => 'Cursos complementarios, certificaciones y talleres para fortalecer el liderazgo y el trabajo en equipo.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Elección de sede y carrera',
                    'descripcion' => 'Revisar las carreras técnicas disponibles y la sede Tecsup donde se dictan.',
                ],
                [
                    'titulo'      => 'Inscripción en la convocatoria',
                    'descripcion' => 'Completar el formulario de beca en la web de Tecsup o en los canales autorizados.',
                ],
                [
                    'titulo'      => 'Evaluación de admisión',
                    'descripcion' => 'Rendir pruebas de conocimientos y/o aptitud, además de la revisión del perfil académico.',
                ],
                [
                    'titulo'      => 'Confirmación de beca y matrícula',
                    'descripcion' => 'Si es seleccionado, confirmar la beca, presentar documentos finales y matricularse.',
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
            'descripcion'     => "La Beca Ferreyros está enfocada en la formación de talento técnico vinculado al sector de maquinaria pesada, minería e industria.\n\nEn varias convocatorias se desarrolla en alianza con instituciones como Tecsup, combinando formación académica, entrenamiento práctico y acercamiento directo a la empresa.",
            'beneficios'      => [
                [
                    'icon'        => 'precision_manufacturing',
                    'titulo'      => 'Formación especializada',
                    'descripcion' => 'Programas orientados a maquinaria pesada, mantenimiento, operación y seguridad industrial.',
                ],
                [
                    'icon'        => 'handshake',
                    'titulo'      => 'Vínculo con empresa líder',
                    'descripcion' => 'Posibilidad de realizar prácticas, visitas guiadas y participar en programas de talento en Ferreyros.',
                ],
                [
                    'icon'        => 'support_agent',
                    'titulo'      => 'Mentorías y acompañamiento',
                    'descripcion' => 'Acompañamiento de instructores y profesionales con experiencia en el sector.',
                ],
                [
                    'icon'        => 'verified',
                    'titulo'      => 'Desarrollo de competencias',
                    'descripcion' => 'Formación en liderazgo, trabajo seguro y cultura de alto desempeño.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Postulación en línea',
                    'descripcion' => 'Registro en la convocatoria de Beca Ferreyros a través de Tecsup o la fundación correspondiente.',
                ],
                [
                    'titulo'      => 'Evaluación técnica',
                    'descripcion' => 'Pruebas de aptitud e interés por el sector industrial y de maquinaria pesada.',
                ],
                [
                    'titulo'      => 'Entrevista y revisión de perfil',
                    'descripcion' => 'Entrevista personal y análisis de la motivación, desempeño académico y potencial del postulante.',
                ],
                [
                    'titulo'      => 'Selección y asignación de programa',
                    'descripcion' => 'Publicación de becarios seleccionados y asignación de la carrera o módulo de especialización.',
                ],
            ],
        ]);

        // 5. BECA UNI (enfocada en estudios en la UNI)
        Beca::create([
            'nombre'          => 'Beca UNI',
            'slug'            => 'beca-uni',
            'imagen_portada'  => 'img/becas/beca-uni.png',
            'banner'          => 'img/becas/beca-uni.png',
            'titulo'          => 'Excelencia académica en ingeniería y ciencias',
            'subtitulo'       => 'Apoyo para estudiantes con alto rendimiento que estudian en la Universidad Nacional de Ingeniería.',
            'descripcion'     => "Beca UNI está pensada para apoyar a jóvenes talentosos que logran ingresar a la Universidad Nacional de Ingeniería y requieren respaldo económico para continuar sus estudios.\n\nSe enfoca en carreras de ingeniería, arquitectura y ciencias, buscando potenciar perfiles con vocación científica y compromiso con el desarrollo del país.",
            'beneficios'      => [
                [
                    'icon'        => 'payments',
                    'titulo'      => 'Apoyo en costos académicos',
                    'descripcion' => 'Cobertura parcial o total de derechos académicos, matrícula y otros gastos vinculados al estudio, según la convocatoria.',
                ],
                [
                    'icon'        => 'restaurant',
                    'titulo'      => 'Apoyo en manutención',
                    'descripcion' => 'Subsidios o apoyos para alimentación, movilidad local y otros gastos básicos.',
                ],
                [
                    'icon'        => 'science',
                    'titulo'      => 'Entorno de investigación',
                    'descripcion' => 'Acceso a laboratorios, proyectos de investigación y actividades académicas avanzadas.',
                ],
                [
                    'icon'        => 'groups',
                    'titulo'      => 'Red académica y profesional',
                    'descripcion' => 'Interacción con docentes, investigadores y estudiantes de alto rendimiento en diferentes especialidades.',
                ],
            ],
            'pasos'           => [
                [
                    'titulo'      => 'Ingreso a la UNI',
                    'descripcion' => 'Rendir y aprobar el examen de admisión a la Universidad Nacional de Ingeniería.',
                ],
                [
                    'titulo'      => 'Revisión de convocatorias de beca',
                    'descripcion' => 'Verificar las bases de la beca o programa de apoyo disponible para ingresantes y estudiantes regulares.',
                ],
                [
                    'titulo'      => 'Postulación y entrega de requisitos',
                    'descripcion' => 'Presentar la ficha de postulación, historial académico y documentación socioeconómica solicitada.',
                ],
                [
                    'titulo'      => 'Evaluación y asignación del beneficio',
                    'descripcion' => 'Esperar los resultados, confirmar la aceptación del beneficio y mantener el rendimiento exigido.',
                ],
            ],
        ]);
    }
}
