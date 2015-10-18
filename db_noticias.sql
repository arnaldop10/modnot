-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2015 a las 21:31:06
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_redaccion` date NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `contenido` text NOT NULL,
  `autor` varchar(15) NOT NULL,
  `estatus` varchar(10) NOT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `categoria` int(100) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Datos de los Artículos' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `fecha_redaccion`, `titulo`, `contenido`, `autor`, `estatus`, `fecha_publicacion`, `categoria`, `imagen`) VALUES
(1, '2015-03-12', 'Contrato Seguro funerario Año 2015 y Planilla de Afiliación', '&lt;p&gt;Estimados Asociados.&lt;/p&gt;\r\n\r\n&lt;p&gt;Adjunto al presente Contrato Seguro funerario A&amp;ntilde;o 2015 y Planilla de Afiliaci&amp;oacute;n, cumplo con notificarles que la fecha tope para realizar cualquier inclusi&amp;oacute;n, exclusi&amp;oacute;n o modificaci&amp;oacute;n en este servicio es hasta el d&amp;iacute;a 30/01/2015.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Para afiliarse a este servicio (nuevo ingreso) debe llenar la planilla de afiliaci&amp;oacute;n y anexar fotocopia de c&amp;eacute;dula o partida de nacimiento de todos los beneficiarios.&lt;/li&gt;\r\n	&lt;li&gt;En caso de incorporaci&amp;oacute;n de uno o mas beneficiarios debe llenar la planilla de afiliaci&amp;oacute;n nuevamente con todos los beneficiarios (esta planilla dejara sin efecto la anterior) y debe anexar fotocopia de c&amp;eacute;dula o partida de nacimiento solo de las personas que esta incorporando en esta oportunidad&lt;/li&gt;\r\n	&lt;li&gt;Los afiliados que deseen cambiar el tipo de plan deben enviar una comunicaci&amp;oacute;n realizando la solicitud formal.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;En la planilla de afiliaci&amp;oacute;n no aparece contemplado el plan elite, quien desee afiliarse a este tipo de plan deben colocar una nota en la planilla.&lt;/p&gt;\r\n\r\n&lt;p&gt;La documentaci&amp;oacute;n puede ser enviada escaneada por esta v&amp;iacute;a.&lt;/p&gt;\r\n\r\n&lt;p&gt;Cualquier duda deben comunicarse con la Srita Erika Ulloa, Recepcionista&lt;/p&gt;\r\n\r\n&lt;p&gt;Los montos y especificaciones del servicio se encuentran estipulados en el contrato adjunto, Se agradece leer con detenimiento el mismo para que tengan clara toda la informaci&amp;oacute;n&lt;/p&gt;\r\n\r\n&lt;p&gt;Sin mas a que hacer referencia,&lt;/p&gt;\r\n\r\n&lt;p&gt;Atentamente&lt;br /&gt;\r\n&lt;br /&gt;\r\nLcda. Yudith Uzc&amp;aacute;tegui&lt;br /&gt;\r\nAdministradora&lt;/p&gt;\r\n', 'admin', 'publicado', '2015-03-12', 1, 'modnot/public/img/noticias/serv_fune.jpg'),
(2, '2015-03-12', 'XVII Juegos Juvineu UNELLEZ 2015', '&lt;p&gt;La Caja de Ahorro y Pr&amp;eacute;stamos de los Profesores de la UNELLEZ (CAPROF-UNELLEZ), les da la m&amp;aacute;s cordial bienvenida a los XVII Juegos Juveneu UNELLEZ 2015, cuya Inauguraci&amp;oacute;n se realizar&amp;aacute; esta tarde a las 5pm en las instalaciones de la Ciudad Deportiva de Barinas.&lt;/p&gt;\r\n\r\n&lt;p&gt;El Evento contar&amp;aacute; con la participaci&amp;oacute;n de unos 3.000 atletas en 23 diversas disciplinas deportivas provenientes de todo el territorio nacional. Este importante evento se llevar&amp;aacute; a cabo en las instalaciones de la Ciudad Deportiva de Barinas del 29 de Enero al 14 de Febrero del a&amp;ntilde;o 2015.&lt;/p&gt;\r\n\r\n&lt;p&gt;Para mayor informaci&amp;oacute;n sobre los Juegos y su cronograma, visite el portal web oficial: &lt;a href=&quot;http://juvineu.unellez.edu.ve/&quot; target=&quot;_blank&quot;&gt;www.juvineu.unellez.edu.ve&lt;/a&gt;&lt;/p&gt;\r\n', 'admin', 'publicado', '2015-03-12', 2, 'modnot/public/img/noticias/juvineu.jpg'),
(3, '2015-03-12', 'Proceso Electoral 2015-2018', '&lt;p&gt;Se les informa a los asociados de la Caja de Ahorro y Pr&amp;eacute;stamo de los Profesores de la Universidad Nacional Experimental de los Llanos Occidentales &amp;ldquo;Ezequiel Zamora&amp;rdquo; la apertura del Proceso Electoral 2015-2018, para elegir los cargos a la Asamblea de Delegados, Consejo de Administraci&amp;oacute;n, Consejo de Vigilancia.&lt;/p&gt;\r\n\r\n&lt;p&gt;El proceso se regir&amp;aacute; por el Cronograma siguiente:&lt;/p&gt;\r\n\r\n&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;th colspan=&quot;5&quot;&gt;CRONOGRAMA ELECTORAL&lt;/th&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;th&gt;N&amp;deg;&lt;/th&gt;\r\n			&lt;th&gt;ACTIVIDADES&lt;/th&gt;\r\n			&lt;th&gt;D&amp;Iacute;A&lt;/th&gt;\r\n			&lt;th&gt;FECHA&lt;/th&gt;\r\n			&lt;th&gt;OBSERVACIONES&lt;/th&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;1&lt;/td&gt;\r\n			&lt;td&gt;Instalaci&amp;oacute;n de la Comisi&amp;oacute;n Electoral&lt;/td&gt;\r\n			&lt;td&gt;Viernes&lt;/td&gt;\r\n			&lt;td&gt;06/02/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 3&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2&lt;/td&gt;\r\n			&lt;td&gt;Instalaci&amp;oacute;n de las Subcomisiones&lt;/td&gt;\r\n			&lt;td&gt;Mi&amp;eacute;rcoles&lt;/td&gt;\r\n			&lt;td&gt;18/02/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 3&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;3&lt;/td&gt;\r\n			&lt;td&gt;Publicaci&amp;oacute;n del Cronograma&lt;/td&gt;\r\n			&lt;td&gt;Lunes&lt;/td&gt;\r\n			&lt;td&gt;23/02/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 15&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;4&lt;/td&gt;\r\n			&lt;td&gt;Publicaci&amp;oacute;n del Registro Electoral&lt;/td&gt;\r\n			&lt;td&gt;Lunes&lt;/td&gt;\r\n			&lt;td&gt;23/02/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 16&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;5&lt;/td&gt;\r\n			&lt;td&gt;Impugnaci&amp;oacute;n del Registro Electoral&lt;/td&gt;\r\n			&lt;td&gt;Martes a Lunes&lt;/td&gt;\r\n			&lt;td&gt;24/02 al 02/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 17&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;6&lt;/td&gt;\r\n			&lt;td&gt;Respuestas a las Impugnaciones&lt;/td&gt;\r\n			&lt;td&gt;Martes y Mi&amp;eacute;rcoles&lt;/td&gt;\r\n			&lt;td&gt;03/03 y 04/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 18&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;7&lt;/td&gt;\r\n			&lt;td&gt;Reconsideraciones&lt;/td&gt;\r\n			&lt;td&gt;Viernes y Lunes&lt;/td&gt;\r\n			&lt;td&gt;06/03 y 09/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 19&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;8&lt;/td&gt;\r\n			&lt;td&gt;Apelaci&amp;oacute;n ante C.E.P.&lt;/td&gt;\r\n			&lt;td&gt;Lunes a Viernes&lt;/td&gt;\r\n			&lt;td&gt;09/03 al 13/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 19 (Par&amp;aacute;grafo &amp;Uacute;nico)&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;9&lt;/td&gt;\r\n			&lt;td&gt;Presentaci&amp;oacute;n de Candidaturas&lt;/td&gt;\r\n			&lt;td&gt;Martes a Viernes&lt;/td&gt;\r\n			&lt;td&gt;17/03 al 20/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 20&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;10&lt;/td&gt;\r\n			&lt;td&gt;Respuesta sobre la admisi&amp;oacute;n de candidaturas&lt;/td&gt;\r\n			&lt;td&gt;Lunes y Martes&lt;/td&gt;\r\n			&lt;td&gt;23/03 al 24/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 25&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;11&lt;/td&gt;\r\n			&lt;td&gt;Reconsideraciones a la admisi&amp;oacute;n de candidaturas&lt;/td&gt;\r\n			&lt;td&gt;Jueves y Viernes&lt;/td&gt;\r\n			&lt;td&gt;26/03 al 27/03/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 26&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;12&lt;/td&gt;\r\n			&lt;td&gt;Cierre de Propaganda&lt;/td&gt;\r\n			&lt;td&gt;Viernes&lt;/td&gt;\r\n			&lt;td&gt;10/04/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 30&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;13&lt;/td&gt;\r\n			&lt;td&gt;Acto de Votaci&amp;oacute;n&lt;/td&gt;\r\n			&lt;td&gt;Lunes&lt;/td&gt;\r\n			&lt;td&gt;13/04/2015&lt;/td&gt;\r\n			&lt;td&gt;Art&amp;iacute;culo N&amp;ordm; 31&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;Por la Comisi&amp;oacute;n Electoral Principal&lt;br /&gt;\r\nCAPROF-UNELLEZ&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Osmar Oliveros&lt;br /&gt;\r\nPresidente&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Linette Colmenares&lt;br /&gt;\r\nSecretaria&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. &amp;Aacute;ngel Mora&lt;br /&gt;\r\nVicepresidente&lt;/strong&gt;&lt;/p&gt;\r\n', 'admin', 'publicado', '2015-03-12', 2, 'modnot/public/img/noticias/elecciones2.jpg'),
(4, '2015-03-12', 'PROCESO ELECTORAL 2015-2018', '&lt;p&gt;PRIMERA REUNI&amp;Oacute;N COMISI&amp;Oacute;N ELECTORAL PRINCIPAL Y LOS PRESIDENTES DE LAS SUBCOMISIONES ELECTORALES CAPROF-UNELLEZ.&lt;/p&gt;\r\n\r\n&lt;p&gt;Fecha: Viernes 06/02/2015&lt;/p&gt;\r\n\r\n&lt;p&gt;Lugar: Sede CAPROF-UNELLEZ&lt;/p&gt;\r\n\r\n&lt;p&gt;Hora: 09:00 a.m.&lt;/p&gt;\r\n\r\n&lt;p&gt;PUNTOS A TRATAR:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Juramentaci&amp;oacute;n Presidentes Sub Comisiones Electorales CAPROF-UNELLEZ&lt;/li&gt;\r\n	&lt;li&gt;Discusi&amp;oacute;n Cronograma Electoral 2015&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Firman los Asistentes:&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Por la Comisi&amp;oacute;n Electoral Principal&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Osmar Oliveros&lt;br /&gt;\r\nPresidente&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Linette Colmenares&lt;br /&gt;\r\nSecretaria&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. &amp;Aacute;ngel Mora&lt;br /&gt;\r\nVicepresidente&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Por las Subcomisiones Electorales&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Pedro Luna&lt;br /&gt;\r\nSubcomisi&amp;oacute;n Apure&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Pedro Salazar&lt;br /&gt;\r\nSubcomisi&amp;oacute;n Guanare&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Prof. Jorge Millano&lt;br /&gt;\r\nSubcomisi&amp;oacute;n San Carlos&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;docs/Acta No 001-2015.pdf&quot; target=&quot;_blank&quot;&gt;Acta N&amp;deg; 001/2015 de Fecha: 06/02/2015&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'admin', 'publicado', '2015-03-13', 3, ''),
(5, '2015-03-26', 'Municipalidad trabaja de la mano con las comunidades', '&lt;h2 style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;Cronograma de Semana Santa 2015 viene cargado de sorpresas&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;-El director de la Fundaci&amp;oacute;n Municipal de Deporte, Carlos Tovar, declar&amp;oacute; que pese al ego&amp;iacute;smo y pretensiones del gobierno regional, la alcald&amp;iacute;a de Barinas ya concreto toda la programaci&amp;oacute;n &amp;nbsp;para el disfrute de propios y turistas, en el balneario Santo Domingo y &amp;nbsp;otros espacios similares del municipio.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;(Prensa Alcald&amp;iacute;a de Barinas) &lt;/strong&gt;Carlos Tovar, director de la Fundaci&amp;oacute;n Municipal de Deporte, anunci&amp;oacute; que el cronograma de actividades de semana santa 2015 que organizo la municipalidad de la mano con las comunidades, vienen cargadas de sorpresas art&amp;iacute;sticas y musicales y pese a todas las dificultades y trabas, ya se concret&amp;oacute; la programaci&amp;oacute;n y&amp;nbsp; se contin&amp;uacute;a &amp;nbsp;trabajando por la recuperaci&amp;oacute;n del r&amp;iacute;o Santo Domingo y otros espacios similares del municipio en funci&amp;oacute;n de ofrecerle a la ciudadan&amp;iacute;a, especialmente a los sectores m&amp;aacute;s humildes unos &amp;nbsp;balnearios con instalaciones dignas y adecuadas.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Afirm&amp;oacute; que ya se cuenta con la programaci&amp;oacute;n para la celebraci&amp;oacute;n de la semana mayor, donde al igual que en los carnavales, se tienen planificadas actividades sorpresas deportivas y recreativas para todas las familias, totalmente gratuitas, tal como siempre las ha realizado la municipalidad.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Manifest&amp;oacute; que desde hace m&amp;aacute;s de un a&amp;ntilde;o, la Alcald&amp;iacute;a de Barinas se dispuso en la tarea de recuperar las instalaciones del balneario, que se encontraban en el suelo, tarea que se ha desarrollado de manera exitosa, generando no solo un espacio para el disfrute de propios y turistas, sino empleos a hombres y mujeres de las comunidades aleda&amp;ntilde;as, qui&amp;eacute;nes fueron incluidos en las cuadrillas de limpieza municipales.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Detall&amp;oacute; que el Alcalde Jos&amp;eacute; Luis Mach&amp;iacute;n no es ego&amp;iacute;sta, recordando que para las temporadas de carnaval, cuando la gobernaci&amp;oacute;n les solicit&amp;oacute; trabajar en el r&amp;iacute;o, se les dio la mitad del espacio en el balneario, sin embargo, &amp;ldquo;ahora no solo quieren un espacio, lo quieren todo; eso no se los vamos a permitir, este es un espacio para el sano esparcimiento del pueblo y est&amp;aacute; bajo la competencia de la Alcald&amp;iacute;a de Barinas&amp;rdquo;.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Finalmente aclar&amp;oacute; que en cuanto a las premiaciones otorgadas durante las competencias deportivas, son destinadas a comprar, uniformes, balones y diferentes materiales necesarios, para fortalecer las diferentes disciplinas deportivas en comunidades y parroquias del municipio capital.&lt;/p&gt;\r\n\r\n&lt;p&gt;Fotoleyendas&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;Foto 1&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;Carlos Tovar, Presidente de la Fundaci&amp;oacute;n Municipal del Deporte&lt;/p&gt;\r\n', 'admin', 'publicado', '2015-03-26', 2, '../public/img/noticias/DSC_2823.JPG'),
(6, '2015-10-12', 'Uso de nuevo editor', '', 'admin', 'editado', '0000-00-00', 2, '../public/img/noticias/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(150) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Datos de las Categorias' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Servicios Funerarios'),
(2, 'Eventos'),
(3, 'Reunión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_articulo` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `fecha_comentario` date NOT NULL,
  `nombre_comentarista` varchar(150) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` text NOT NULL,
  `valoracion` smallint(6) DEFAULT NULL,
  KEY `id_comentario` (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de los Comentarios a los Articulos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `nombre_inst_emp` varchar(250) NOT NULL,
  `ruta_circulares` varchar(250) NOT NULL,
  `ruta_descargas` varchar(250) NOT NULL,
  `responder_comentarios` varchar(2) NOT NULL,
  `ocultar_comentarios` varchar(2) NOT NULL,
  `ruta_imagenes` varchar(250) NOT NULL,
  `noticiasxpaginas` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Información de Configuración';

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`nombre_inst_emp`, `ruta_circulares`, `ruta_descargas`, `responder_comentarios`, `ocultar_comentarios`, `ruta_imagenes`, `noticiasxpaginas`) VALUES
('Alcaldia del Municipio Barinas', '../modnot/public/docs/', '../modnot/public/download/', 'si', 'no', '../modnot/public/img/noticias/', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(10) NOT NULL,
  `nombre_usuario` varchar(150) NOT NULL,
  `login` varchar(25) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pregunta_secreta` varchar(250) NOT NULL,
  `respuesta_secreta` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de los Usuarios del Sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `login`, `clave`, `email`, `pregunta_secreta`, `respuesta_secreta`) VALUES
('11.111.111', 'administrador', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrador@noticias.com', 'nombre modulo', 'noticias'),
('16.371.258', 'Arnaldo Paredes', 'aparedes', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'arnaldop10@gmail.com', 'Nombre de Mascota', 'bongo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
