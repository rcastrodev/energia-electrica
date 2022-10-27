<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Grupo-880.png',
                'content_1' => 'SOLUCIONES ENERGÉTICAS PARA TODAS LAS INDUSTRIAS',
                'content_2' => 'Trabajamos arduamente para garantizar la calidad de nuestros servicios teniendo en cuenta la necesidad de cada cliente.'
            ]);
        }

        Content::create([
            'section_id'    => 2,
            'order'         => 'AA',
            'image'         => 'images/home/Enmascarar-grupo-157.png',
            'content_1'     => 'ASISTENCIA 24 HORAS',
            'content_2'     => '<p>Brindamos un servicio de atención personalizada las 24 horas con el objetivo de cubrir mejor tus necesidades, asesorarte sobre el correcto uso de los equipos y estar siempre a disposición ante cualquier inquietud o eventualidad.</p>',
        ]);
        
        /** Fin home page */

        /** Empresa  */
        for ($i=0; $i < 2; $i++) { 
            Content::create([
                'section_id'    => 3,
                'order'         => 'AA',
                'image'         => 'images/company/Enmascarar-grupo-107.png',
            ]);
        }

        Content::create([
            'section_id'    => 4,
            'content_1'     => 'NUESTRA EMPRESA',
            'content_2'     => '<p>Contamos con mas de 30 años de experiencia, y cientos de proyectos ejecutados con éxito, nos hemos convertido en sinónimo de calidad, experiencia y seriedad en obras y montajes industriales. Situados en Buenos Aires, Argentina, llevamos a cabo proyectos en todo el país.</p>
            <p>Principalmente nos abocamos en la solución de problemas energéticos, mantenimiento de grupos electrógenos, instalaciones eléctricas y montajes.</p>',
            'content_3'     => 'images/company/4-2.png',
            'content_4'     => 'images/company/5.png',
        ]);
        
        Content::create([
            'section_id'    => 5,
            'content_1'     => 'Beneficios de trabajar con nuestra empresa:'
        ]);
        
        Content::create([
            'section_id' => 6,
            'order'     => 'AA',
            'image'     => 'images/company/Icon-metro-tools.svg',
            'content_1' => 'TÉCNICO ESPECIALIZADOS',
            'content_2' => '<p>Nuestro personal técnico nos respalda en las decisiones tecnológicas, energética e ingeniería.</p>',
        ]);

        Content::create([
            'section_id' => 6,
            'order'     => 'AA',
            'image'     => 'images/company/Icon-ionic-md-home.svg',
            'content_1' => 'SERVICIO IN SITU',
            'content_2' => '<p>Actualización, reparación y mantenimiento de todos los Routers y Fresadoras a Control Numérico, Importados y Nacionales.</p>',
        ]);

        Content::create([
            'section_id' => 6,
            'order'     => 'AA',
            'image'     => 'images/company/Icon-awesome-calendar-alt.svg',
            'content_1' => 'ABONO MENSUAL',
            'content_2' => '<p>Servicio de abono mensual para industrias, empresas y particulares.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'content_1' => 'VISIÓN',
            'content_2' => '<p>Distinguirnos en el mercado nacional por nuestro equipo de profesionales altamente capacitado y el compromiso que tenemos con cada cliente.</p>',
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'BB',
            'content_1' => 'MISION',
            'content_2' => '<p>Proveer un servicio distinguido trabajando con responsabilidad y eficacia en todos los niveles de nuestra organización, colaborando a la vez con el cuidado del medio ambiente.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'CC',
            'content_1' => 'RESPONSABILIDAD',
            'content_2' => '<p>Entendiendo los tiempos que corren, debemos asegurar el cuidado del medio ambiente y concientizar a nuestros clientes sobre el mismo.</p>',
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'AA',
            'image'     => 'images/services/Grupo-881.png',
            'content_1' => 'Servicios'
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'AA',
            'image'     => 'images/services/Enmascarar-grupo-110.png',
            'content_1' => 'Servicios de ingeniería eléctrica',
            'content_2' => '<p>Desarrollo de ingenierías conceptuales, tanto para proyectos nuevos como para modificaciones.</p>',
        ]);

        Content::create([
            'section_id' => 9,
            'order'     => 'AA',
            'image'     => 'images/services/Mask_Group_252.png',
            'content_1' => 'EQUIPOS PARA FABRICACIÓN',
            'content_2' => '<p>Equipos para fabricación de piezas de esculturas y marcos artísticos.</p>',
        ]);

        Content::create([
            'section_id' => 10,
            'image'     => 'images/clients/Grupo-882.png',
            'content_1' => 'clientes',
        ]);

        Content::create([
            'section_id'=> 11,
            'order'     => 'AA',
            'image'     => 'images/clients/logoCMGnuevo.png',
        ]);

        
        Content::create([
            'section_id' => 11,
            'order'     => 'BB',
            'image'     => 'images/clients/Imagen-217.png',
        ]);

        Content::create([
            'section_id' => 11,
            'order'     => 'CC',
            'image'     => 'images/clients/Enmascarar-grupo-139.png',
        ]);

        Content::create([
            'section_id' => 11,
            'order'     => 'CC',
            'image'     => 'images/clients/Enmascarar-grupo-139.png',
        ]);

        Content::create([
            'section_id' => 12,
            'image'     => 'images/blog/Grupo-883.png',
            'content_1' => 'Blog',
        ]);

        Content::create([
            'section_id'=> 13,
            'image'     => 'images/blog/Enmascarar-grupo-131.png',
            'content_1' => 'Energía Eléctrica participa en EXPO sustentable',
            'content_2' => '<p>Enterate de lo realizado en la expo de energías renovables.</p>',
            'content_4' => 'NOVEDADES'
        ]);

        Content::create([
            'section_id'=> 13,
            'image'     => 'images/blog/Enmascarar-grupo-130.png',
            'content_1' => 'Como elegir el generador perfecto',
            'content_2' => '<p>Dependiendo del uso que le necesitemos dar al generador, la elección del equipo.</p>',
            'content_4' => 'DATOS ÚTILES'
        ]);

        Content::create([
            'section_id'=> 13,
            'image'     => 'images/blog/Enmascarar-grupo-127.png',
            'content_1' => 'Casa ecológica',
            'content_2' => '<p>Conocé más sobre el proyecto sustentable del que fuimos parte.</p>'
        ]);

    }
}

    