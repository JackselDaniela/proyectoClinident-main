@extends('layouts.plantilla4')
@section('title')
<title>Clinident / Pagina Principal</title>
@endsection
@section('css-externo')
    <link href="{{asset('landing/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet"> 
    <link href="{{asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet')}}">
    <link href="{{asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/landing.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    
@endsection
@section('contenido')
    <body>
  
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center  fixed-top">
      <div class="container d-flex justify-content-between" style="padding-left: 750px;">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">clinident@contacto.com</a>
          <i class="bi bi-phone"></i> +56 5589 5548 55
        </div>
      </div>
    </div>
  
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
  
        <img width="50px" style="padding-right: 10px;" src="{{asset('landing/assets/img/isotipo.png')}}" alt="Logo">
        <h1 class="logo me-auto"><a href="{{('Landing')}}" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight:800;"> Clinident </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
        <nav id="navbar" class="navbar order-last order-lg-0" >
          <ul>
            <li><a class="nav-link scrollto" href="#start">Inicio</a></li>
            <li><a class="nav-link scrollto" href="#why-us">Servicios</a></li>
            <li><a class="nav-link scrollto" href="#services">Beneficios</a></li>
            <li><a class="nav-link scrollto" href="#departments">Especialidades</a></li>
            <li><a class="nav-link scrollto" href="#doctors">Doctores</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        
  
        <!-- Button trigger modal -->
        <button id="add-register"  class="appointment-btn scrollto" data-toggle="modal"  style="margin-left:18rem!important; color:#fff; border:none!important" >Iniciar Sesión</button>
      </div>
    </header><!-- End Header -->
     <!-- Modal -->
    
     <div class="modal fade" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" id="btn-close" style="padding-top: 1rem">
            <span aria-hidden="true">&times;</span>
          </button>
          <img src="{{asset('assets/img/logoc.png')}}" style="width: 5rem">
          <div class="modal-header">
            
            <h5 class="modal-title text-center" id="exampleModalLongTitle" style="font-size: 1rem">Inicio de Sesión</h5>
            
          </div>
          <div class="modal-body">
            <div class="limiter">
              <div class="container-login100">
                <div class="wrap-login100">
  
                  <form class="login100-form validate-form">
          
                    <div class="form-group">
                      <label>Usuario</label>
                      <input type="text" autofocus="" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" class="form-control">
                  </div>
                  <div class="form-group text-center">
                      <a href="forgot-password.html">Ha olvidado su contraseña?</a>
                  </div>
                  
                    
                    <div class="container-login100-form-btn">
                      <button type="submit" style="border:none" class="appointment-btn scrollto">
                        <a href="{{asset('Index')}}" style=" color:aliceblue;!important; ">Ingresar</a>
                      </button>
                    </div>
          
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
  
    
    <section id="start" class="d-flex align-items-center">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-inner">
          <div class="carousel-item active" >
            <img class="d-block w-100" src="{{asset('landing/assets/img/1.png')}}" >
            <div class="carousel-caption d-none d-md-block" style="background-color:rgb(255, 255, 255, .6); color:blueviolet; border-radius:10rem;">
              <h1 style="font-size: 4rem; ">Bienvenidos a Clinident</h1>
              <p>El Software para la Gestion Odontológica más novedosa</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('landing/assets/img/p1 (2).png')}}">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('landing/assets/img/3.png')}}">
            <div class="carousel-caption d-none d-md-block">
              <h1>Comodas Cuotas de Pago</h1>
              <p>Para aliviar tu Gestion y garantizar la seguridad de tus datos</p>
            </div>
          </div>
        </div>
        
      </div>

    </section>
    


    <!-- End Hero -->
  
    <main id="main">
  
      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us">
        <div class="container">
  
          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="content">
                <h3 class="text-center">¿Qué es Clinident?</h3>
                <p>
                  Si tu intención es ahorrar tiempo y llevar un orden de manera eficaz, la aplicación de Software Administrativo Clinident es para ti.
                  Clinident es una herramienta poderosa que te asegura eficiencia, rentabilidad y la automatización de los procesos inherentes a tu clínica,
                  ademas es un software especializado para la gestión de clínicas odontológicas que ofrece una amplia variedad de funcionalidades diseñadas específicamente para cubrir las necesidades de tu empresa.</p>
              </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i><img style="width: 50px; padding-bottom: 20px;" src="{{asset('landing/assets/img/grafico-de-barras.gif')}}" alt=""></i>
                      <h4>Gestión de Empleados</h4>
                      <p>Este módulo en la aplicación se encarga de la administración y registro de los empleados, 
                        generando su contrato y expediente, para llevar el control de cada uno según su cargo en la clínica. </p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i><img style="width: 50px; padding-bottom: 20px;" src="{{asset('landing/assets/img/cliente.gif')}}" alt=""></i>
                      <h4>Gestión de Pacientes</h4>
                      <p>Manejo de datos de los paciente registrando su expediente clínico, diagnóstico e historial clínico de tratamientos para obtener un control eficaz de la ruta de tratamiento por paciente en el sistema. </p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i><img style="width: 50px; padding-bottom: 20px;" src="{{asset('landing/assets/img/carrito-de-compras.gif')}}" alt=""></i>
                      <h4>Compras de Insumos</h4>
                      <p>Proceso donde se encuentra la administración de los insumos requeridos por la clínica y el control de proveedores para generar las compras.</p>
                    </div>
                  </div>
                </div>
              </div><!-- End .content-->
            </div>
          </div>
        </div>
      </section><!-- End Why Us Section -->
  
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container-fluid">
  
          <div class="row">
            <div class="col-xl-5 col-lg-6 d-flex justify-content-center align-items-stretch position-relative">
              <img class="col-xl-5 col-lg-6 d-flex justify-content-center  position-relative" style="width: 60rem!important" src="{{(asset('landing/assets/img/depar5.jpg'))}}" alt="">
            </div>
  
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <h3 class="text-center">¿Por qué elegir Clinident?</h3>
              <p>Clinident es la solución para automatizar tu clínica, siendo un software que permite agilizar los trabajos entre tu clínica dental, tus trabajadores y clientes.</p>
  
              <div class="icon-box">
                <div class="icon"><i class="fa fa-line-chart"></i></div>
                <h4 class="title"><a href="">Ágil</a></h4>
                <p class="description">Agilizas las tareas operativas y reduces el margen de error en los procesos de tu clínica.</p>
              </div>
  
              <div class="icon-box">
                <div class="icon"><i class="fa fa-check-square"></i></div>
                <h4 class="title"><a href="">Eficaz</a></h4>
                <p class="description">Ya no necesitas trabajar con diferentes herramientas, puedes automatizar todo en una sola herramienta.</p>
              </div>
  
              <div class="icon-box">
                <div class="icon"><i class="fa fa-book"></i></div>
                <h4 class="title"><a href="">Organizada</a></h4>
                <p class="description">Administra los procesos de una forma ordenada facilitando la ejecución de las tareas. </p>
              </div>
  
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container">
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6">
              <div id="count-box" class="count-box">
                <i class="fas fa-user-md"></i>
                <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
                <p>Doctores</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div id="count-box" class="count-box">
                <i class="far fa-hospital"></i>
                <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
                <p>Departamentos</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div id="count-box" class="count-box">
                <i class="fas fa-flask"></i>
                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
                <p>Clientes</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="fas fa-award"></i>
                <span data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1" class="purecounter"></span>
                <p>Alcance</p>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Counts Section -->
  
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
  
          <div class="section-title">
            <h2>Beneficios</h2>
            <p>En general, el software administrativo puede proporcionar una serie de beneficios para las clínicas dentales. Al automatizar las tareas administrativas, mejorar y proteger la seguridad de los datos, el software administrativo puede ayudar a mejorar la eficiencia, la productividad y la rentabilidad.</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                <h4><a href="">Escalabilidad</a></h4>
                <p>El software administrativo se puede escalar para satisfacer las necesidades de su clínica dental en crecimiento. Esto significa que puede agregar usuarios y módulos a medida que crece su clínica, sin tener que reemplazar todo su sistema de software.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
              <div class="icon-box">
                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                <h4><a href="">Toma de decisiones mejorada</a></h4>
                <p>El software administrativo puede ayudarlo a tomar mejores decisiones sobre su clínica dental al brindarle información sobre su desempeño financiero, los pacientes y las tendencias de tratamiento.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-receipt"></i></div>
                <h4><a href="">Seguridad de datos mejorada</a></h4>
                <p>El software administrativo puede ayudar a proteger los datos de sus pacientes proporcionando acceso y almacenamiento seguros.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-users"></i></div>
                <h4><a href="">Personalización</a></h4>
                <p>El software administrativo se puede personalizar para satisfacer las necesidades específicas de su clínica dental. Esto significa que puede elegir las funciones y los módulos que sean más importantes para usted y su personal.s</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fa-solid fa-star"></i></div>
                <h4><a href="">Mayor eficiencia y productividad</a></h4>
                <p>El software administrativo puede ayudar a agilizar muchas de las tareas administrativas involucradas en el funcionamiento de una clínica dental, como programar citas, administrar registros de pacientes y facturar a los pacientes.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-notes-medical"></i></div>
                <h4><a href="">Costos reducidos</a></h4>
                <p> El software administrativo puede ayudarlo a reducir costos al automatizar muchas de las tareas administrativas que, de otro modo, se realizarían manualmente. Esto puede ahorrarle tiempo y dinero en costos de mano de obra.</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->
  
      <!-- ======= Departments Section ======= -->
      <section id="departments" class="departments">
        <div class="container">
  
          <div class="section-title">
            <h2>Especialidades</h2>
            <p>Estas son solo algunas de las muchas especialidades que existen dentro de una clínica dental.</p>
          </div>
  
          <div class="row gy-4">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Odontología general</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Endodoncia</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Patología maxilofacial y oral</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Cirugía oral y maxilofacial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Ortodoncia</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Odontología general</h3>
                      <p class="fst-italic">La odontología general proporciona los conocimientos fundamentales para aplicar tratamientos básicos con los que mejorar la salud bucal. También tiene una parte preventiva, pues proporciona recomendaciones sobre higiene y salud bucodental que ayudan a evitar la aparición de otras enfermedades más graves que ya necesitaría atender un odontólogo más especializado.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img style="height: 250px;" src="{{asset('landing/assets/img/odontologiage.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Endodoncia</h3>
                      <p class="fst-italic">Especialidad en la pulpa dental (el nervio del diente) en todos sus aspectos, abarcando el diagnóstico, prevención y tratamiento de la misma.
                        Gracias a esta especialidad se pueden mantener las piezas dentales del paciente aun cuando su nervio está dañando, ya que hoy en día se ha mejorado mucho la calidad de este tipo de tratamientos. Por citar algunos de los principales tratamientos, hablamos de la “terapia del conducto radicular”, el retratamiento endodóntico o directamente la cirugía.
                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{asset('landing/assets/img/endodoncia.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-3">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Patología maxilofacial y oral</h3>
                      <p class="fst-italic">La patología maxilofacial y oral es la rama que realiza el diagnóstico y estudio de las enfermedades de la cavidad oral, mandíbulas (maxilares) y estructuras relacionadas. Tanto en sus causas como en su manera de afectar al paciente.
                        Pero no solo en la boca y sus estructuras relacionadas (glándulas salivales, articulaciones temporomandibulares… incluso la piel alrededor de la boca), un odontólogo especializado en patología maxilofacial y oral también puede llegar a diagnosticar y tratar enfermedades en cuello y cabeza.
                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{asset('landing/assets/img/patologia.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-4">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Cirugía oral y maxilofacial</h3>
                      <p class="fst-italic">Un especialista en cirugía oral y maxilofacial se encarga directamente de intervenir en enfermedades y lesiones en la cabeza, cuello, cara, mandíbulas y tejidos duros y blandos de la boca. También en el caso de que se haya nacido con defectos que afecten a cualquiera de estas áreas. Su campo de acción es tan amplio que va desde intervenciones pequeñas como extraer un diente, ya mencionada, a otras mucho más complicadas que incluso requieren intervenciones junto a otros especialistas médicos</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{asset('landing/assets/img/cirugia.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-5">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Ortodoncia</h3>
                      <p class="fst-italic">La especialidad de ortodoncia abarca no sólo la corrección de las mandíbulas y los dientes mal posicionados – alineándolos correctamente para modificar la mordida y que haya una correcta oclusión. También se ocupa del diagnóstico y, muy importante, de la prevención.
                        Uno de los motivos por los que es una rama de la odontología muy demandada es que es de las mejor pagadas. Por no hablar de que actualmente, quién no ha llevado o lleva una ortodoncia.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{asset('landing/assets/img/ortodoncia.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Departments Section -->
  
      <!-- ======= Doctors Section ======= -->
      <section id="doctors" class="doctors">
        <div class="container">
  
          <div class="section-title">
            <h2>Doctores</h2>
            <p>Estos son solo algunos de los doctores de la clínica dental que utilizan la aplicación de software para mejorar la atención al paciente.</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('landing/assets/img/doctors/doctors-1.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Lore Muñoz</h4>
                  <span>Cirujana maxilofacial</span>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 mt-4 mt-lg-0">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('landing/assets/img/doctors/doctors-33.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Daniel Díaz</h4>
                  <span>Ortodoncista</span>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 mt-4">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('landing/assets/img/doctors/doctors-3.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Sara Ramirez</h4>
                  <span>Odontologa General</span>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 mt-4">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{asset('landing/assets/img/doctors/doctors-4.jpg')}}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Amanda Soto</h4>
                  <span>Odontologa pediátrica</span>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Doctors Section -->
  
  
      <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="gallery">
        <div class="container">
  
          <div class="section-title">
            <h2>Galeria</h2>
          </div>
        </div>
  
        <div class="container-fluid">
          <div class="row g-0">
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/1.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/1.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/2.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/2.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/3.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/3.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/4.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/4.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/5.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/5.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/6.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/6.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/7.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/7.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{asset('landing/assets/img/gallery/8.jpg')}}" class="galelry-lightbox">
                  <img src="{{asset('landing/assets/img/gallery/8.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Gallery Section -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">
  
          <div class="section-title">
            <h2>Contacto</h2>
            <p>Para mas información o dudas puedes contactarnos.</p>
          </div>
        </div>
  
        <div class="container">
          <div class="row mt-5">
  
            <div class="col-lg-4">
              <div class="info">
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Correo:</h4>
                  <p>clinident@contacto.com</p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Teléfono:</h4>
                  <p>+56 5589 5548 55</p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-5 mt-lg-0">
  
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre y Apellido" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><a class="appointment-btn scrollto" style="color: #fff">Enviar</a></div>
              </form>
  
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer">
  
      
  
      <div class="container d-md-flex py-4">
  
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Clinident</span></strong>. Aplicación Administrativa
          </div>
          <div class="credits">
            Todos los derechos reservados UPTA Aragua
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
   
  
   
  
    
  
  </body>
@endsection

@section('js-externo')
<script src="{{asset('landing/assets/js/modalLanding.js')}}"></script>
    
  
    <!-- Template Main JS File -->
    <script src="{{asset('landing/assets/js/main.js')}}"></script>
    
    <!-- Vendor JS Files -->
    <script src="{{asset('landing/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('landing/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing/assets/vendor/php-email-form/validate.js')}}"></script>
    
    
  <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>

  <script type="text/javascript">

    $('#add-register').click(function(event) {
      event.preventDefault();
      let fondo='<div class="modal-backdrop fade show"></div>'
      $('body').append(fondo).addClass('modal-open').css({overflow: 'hidden'});
      $('#modal-data').addClass('show').css('display', 'block');
    });

     //cerrar modal cuando se precione la x
    $(document).on('click', '#btn-close', function(event) {
      event.preventDefault();
      $('#modal-data').removeClass('show').removeAttr('style');
      $('.modal-backdrop').remove();
      $('body').removeClass('modal-open').removeAttr('style');
    });

  </script>

@endsection
