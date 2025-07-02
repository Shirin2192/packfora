<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- Metas -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="keywords" content="HTML5">
      <meta name="description" content="Multi-Purpose">
      <meta name="author" content="">
      <!-- Title  -->
      <title>End-to-End Packaging and Brand Consulting Solutions - Packfora</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="assets/imgs/favicon.svg">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap"
         rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@200;300;400;600;700;900&display=swap"
         rel="stylesheet">
      <!-- Plugins -->
      <link rel="stylesheet" href="assets/common/css/plugins.css">
      <!-- Core Style Css -->
      <link rel="stylesheet" href="assets/common/css/common_style.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/responsive.css">
      <!-- External Css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/1.0.1/css/themify-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
   </head>
   <body>
      <?php include 'db_connect.php';
         include 'config.php';  
         ?>
      <!-- ==================== Start Loading ==================== -->
      <!-- <div class="loader-wrap">
         <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
             <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
         </svg>
         <div class="loader-wrap-heading">
             <div class="load-text">
                 <span>L</span>
                 <span>o</span>
                 <span>a</span>
                 <span>d</span>
                 <span>i</span>
                 <span>n</span>
                 <span>g</span>
             </div>
         </div>
         </div> -->
      <!-- ==================== End Loading ==================== -->
      <!-- <div class="cursor"></div> -->
      <!-- ==================== Start progress-scroll-button ==================== -->
      <div id="scrollProgress"></div>
      <button class="scroll-top-btn" id="scrollTopBtn" aria-label="Scroll to Top">
         <svg class="custom-logo" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="ray"
               d="M19.8786 23.9485C19.8786 26.1939 21.6986 28.0147 23.9431 28.0147C26.1875 28.0147 28.0076 26.1939 28.0076 23.9485C28.0076 21.7031 26.1875 19.8823 23.9431 19.8823C21.6986 19.8823 19.8786 21.7031 19.8786 23.9485Z" />
            <path class="ray"
               d="M18.8854 19.3265C18.9379 19.2696 18.9861 19.2127 19.0429 19.1558C18.9686 17.8033 19.2442 16.5209 19.2442 16.5209C20.0536 10.078 25.5313 6.06872 28.3226 4.06408C31.1096 2.06382 30.7683 1.79245 31.1665 1.03087C30.7596 0.706974 27.9157 0.269274 26.6251 0.0810657C26.3363 2.00254 24.2494 4.14724 23.8993 4.50615C23.5493 4.86068 22.5037 5.86301 21.1255 7.59627C17.6823 12.354 18.566 17.8471 18.8898 19.3221L18.8854 19.3265Z" />
            <path class="ray"
               d="M21.0424 17.742C21.1124 17.707 21.1824 17.672 21.2524 17.6413C21.703 16.3677 22.4424 15.2909 22.4424 15.2909C25.6538 9.64905 32.2515 8.03834 35.5941 7.25925C38.9367 6.47578 38.7223 6.09936 39.3786 5.54786C39.1292 5.09266 36.666 3.59575 35.546 2.93046C34.5441 4.59369 31.7965 5.77984 31.3371 5.97243C30.8777 6.16939 29.5302 6.69025 27.592 7.76697C22.5955 10.844 21.3093 16.2539 21.0424 17.742Z" />
            <path class="ray"
               d="M33.5028 10.3931C27.7057 11.321 24.4462 15.8337 23.6325 17.1074C23.7112 17.1074 23.7856 17.0986 23.8643 17.0942C24.7656 16.0875 25.8682 15.3741 25.8682 15.3741C30.9958 11.3911 37.7029 12.4284 41.0893 12.9887C44.4757 13.5445 44.4232 13.1112 45.2413 12.8573C45.1844 12.3409 43.4825 10.0167 42.6994 8.97501C41.1374 10.1261 38.1448 10.1699 37.6461 10.1743C37.1473 10.1787 35.7035 10.148 33.4984 10.3975L33.5028 10.3931Z" />
            <path class="ray"
               d="M47.0045 17.2912C45.1232 17.7595 42.3406 16.6522 41.8768 16.4639C41.4131 16.2757 40.0918 15.6936 37.9611 15.0808C32.2515 13.7196 27.5176 16.639 26.2794 17.5013C26.3494 17.5275 26.4238 17.5538 26.4938 17.5801C27.7145 16.9936 29.0008 16.7572 29.0008 16.7572C35.2616 15.0371 41.063 18.5693 43.9769 20.3813C46.8908 22.1934 47.0089 21.7732 47.8664 21.8476C48.0108 21.3486 47.3283 18.5474 47.0045 17.2868V17.2912Z" />
            <path class="ray"
               d="M40.2887 21.1254C35.5329 17.6807 30.0421 18.5649 28.5676 18.8888C28.6245 18.9413 28.6814 18.9894 28.7383 19.0463C30.0902 18.9719 31.3721 19.2477 31.3721 19.2477C37.8123 20.0574 41.82 25.5373 43.8238 28.3298C45.8232 31.1179 46.0945 30.7765 46.8557 31.1748C47.1795 30.7678 47.6214 27.9228 47.8052 26.6316C45.8888 26.3427 43.7406 24.2549 43.3819 23.9047C43.0275 23.5546 42.0256 22.5085 40.293 21.1298L40.2887 21.1254Z" />
            <path class="ray"
               d="M41.9162 31.3455C41.7193 30.886 41.1987 29.5379 40.1224 27.5989C37.0467 22.6004 31.639 21.3136 30.1514 21.0466C30.1864 21.1166 30.2214 21.1867 30.2521 21.2567C31.5252 21.7075 32.6015 22.4472 32.6015 22.4472C38.2455 25.6599 39.8511 32.2603 40.6299 35.6043C41.4131 38.9483 41.7893 38.7338 42.3406 39.3904C42.7956 39.1409 44.2919 36.6766 44.9569 35.5561C43.2944 34.5538 42.1087 31.8051 41.9162 31.3455Z" />
            <path class="ray"
               d="M37.4973 33.5121C36.5698 27.7127 32.059 24.4519 30.7858 23.6377C30.7858 23.7165 30.7946 23.7909 30.799 23.8697C31.8052 24.7714 32.5184 25.8744 32.5184 25.8744C36.4998 31.0041 35.4629 37.714 34.9028 41.1017C34.3472 44.4895 34.7803 44.437 35.0341 45.2554C35.5504 45.1985 37.8736 43.4959 38.9149 42.7168C37.7642 41.1543 37.7204 38.1604 37.7161 37.6615C37.7117 37.1625 37.7423 35.7181 37.4929 33.5121H37.4973Z" />
            <path class="ray"
               d="M30.3089 26.5003C30.8952 27.7214 31.1315 29.0083 31.1315 29.0083C32.8509 35.2717 29.3202 41.0755 27.5088 43.9905C25.6975 46.9056 26.1175 47.0237 26.0432 47.8816C26.5419 48.026 29.342 47.3433 30.6021 47.0194C30.1339 45.1373 31.2408 42.3535 31.429 41.8896C31.6171 41.4256 32.199 40.1038 32.8115 37.9722C34.1722 32.2603 31.254 27.5245 30.3921 26.2858C30.3658 26.3558 30.3396 26.4302 30.3133 26.5003H30.3089Z" />
            <path class="ray"
               d="M29.0008 28.5706C28.9483 28.6275 28.9001 28.6844 28.8476 28.7413C28.922 30.0937 28.6464 31.3762 28.6464 31.3762C27.837 37.819 22.3593 41.8283 19.5679 43.8329C16.781 45.8332 17.1222 46.1046 16.7241 46.8662C17.131 47.1901 19.9748 47.6321 21.2655 47.816C21.5543 45.8945 23.6412 43.7498 23.9912 43.3909C24.3412 43.0363 25.3869 42.034 26.7651 40.3008C30.2083 35.543 29.3245 30.05 29.0008 28.5749V28.5706Z" />
            <path class="ray"
               d="M26.8482 30.1594C26.7782 30.1944 26.7082 30.2294 26.6382 30.2601C26.1875 31.5337 25.4481 32.6105 25.4481 32.6105C22.2368 38.2567 15.6391 39.8631 12.2964 40.6422C8.95383 41.4256 9.16822 41.802 8.51194 42.3535C8.76133 42.8087 11.2245 44.3056 12.3446 44.9709C13.3465 43.3077 16.0941 42.1216 16.5535 41.929C17.0129 41.732 18.3604 41.2112 20.2986 40.1344C25.295 37.0574 26.5813 31.6475 26.8482 30.1594Z" />
            <path class="ray"
               d="M14.3834 37.5083C20.1805 36.5804 23.44 32.0677 24.2537 30.794C24.175 30.794 24.1006 30.8072 24.0218 30.8072C23.1206 31.8139 22.018 32.5273 22.018 32.5273C16.8904 36.5103 10.1833 35.473 6.79689 34.9127C3.41052 34.3569 3.46302 34.7902 2.64487 35.044C2.70175 35.5605 4.40368 37.8847 5.18246 38.9264C6.74438 37.7753 9.73699 37.7315 10.2358 37.7271C10.7345 37.7227 12.1783 37.7534 14.3834 37.5039V37.5083Z" />
            <path class="ray"
               d="M9.92512 32.8162C15.6347 34.1774 20.3686 31.258 21.6068 30.3957C21.5368 30.3695 21.4624 30.3432 21.3924 30.317C20.1717 30.9035 18.8854 31.1398 18.8854 31.1398C12.6246 32.86 6.82314 29.3278 3.90929 27.5157C0.995439 25.7037 0.87731 26.1238 0.0197807 26.0494C-0.124599 26.5484 0.557925 29.3497 0.881686 30.6102C2.763 30.1419 5.54559 31.2492 6.00936 31.4375C6.47312 31.6257 7.79442 32.2078 9.92512 32.8206V32.8162Z" />
            <path class="ray"
               d="M7.60191 26.776C12.3577 30.2207 17.8485 29.3365 19.3229 29.0126C19.2661 28.9601 19.2092 28.912 19.1523 28.8594C17.8004 28.9338 16.5185 28.6581 16.5185 28.6581C10.0782 27.8484 6.07061 22.3684 4.06679 19.576C2.06735 16.7878 1.79609 17.1292 1.03482 16.7309C0.711054 17.138 0.269165 19.983 0.0854087 21.2742C2.00172 21.5631 4.14992 23.6509 4.50868 24.001C4.86307 24.3512 5.86498 25.3973 7.59754 26.776H7.60191Z" />
            <path class="ray"
               d="M2.93363 12.3452C3.59865 11.2248 5.09495 8.76054 5.54997 8.51105C6.10124 9.17197 6.48188 8.9575 7.26065 12.2971C8.0438 15.6411 9.64948 22.2415 15.2891 25.4542C15.2891 25.4542 16.3653 26.1983 17.6385 26.6447C17.6691 26.7147 17.7085 26.7848 17.7391 26.8548C16.2516 26.5878 10.8395 25.301 7.76817 20.3025C6.69626 18.3635 6.17124 17.0154 5.97436 16.5559C5.77748 16.0963 4.59619 13.3476 2.93363 12.3452Z" />
            <path class="ray"
               d="M10.3933 14.3849C11.3208 20.1843 15.8316 23.4452 17.1047 24.2593C17.1047 24.1805 17.096 24.1061 17.0916 24.0273C16.0853 23.1256 15.3722 22.0227 15.3722 22.0227C11.3908 16.8929 12.4277 10.183 12.9877 6.79529C13.5434 3.40754 13.1102 3.46006 12.8565 2.64158C12.3402 2.69848 10.017 4.40111 8.97571 5.18458C10.1264 6.74714 10.1701 9.74097 10.1745 10.2399C10.1789 10.7389 10.1483 12.1833 10.3976 14.3893L10.3933 14.3849Z" />
            <path class="ray"
               d="M17.5816 21.4011C16.9954 20.18 16.7591 18.8932 16.7591 18.8932C15.0397 12.6298 18.5704 6.82593 20.3817 3.91089C22.193 0.995846 21.773 0.877669 21.8474 0.0197888C21.3486 -0.12465 18.5485 0.558153 17.2885 0.882046C17.7566 2.76413 16.6497 5.54786 16.4616 6.01182C16.2735 6.47577 15.6916 7.79761 15.079 9.92918C13.7184 15.6411 16.6366 20.3769 17.4985 21.6156C17.5247 21.5456 17.551 21.4712 17.5773 21.4011H17.5816Z" />
         </svg>
      </button>
      <!-- ==================== End progress-scroll-button ==================== -->
      <?php include('header.php'); ?>
      <main>
         <!-- ==== Start Slider ==== -->
         <section class="home-slider">
            <div class="owl-carousel owl-theme hero-slider">
               <div class="item slide1">
                  <div class="container">
                     <div class="content">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Unlock Unimaginable Business Impact Using Packaging as a Business Weapon
                        </h2>
                        <a href="about-us.php" class="read_more wow fadeInUp" data-wow-delay="0.4s">Learn more about us</a>
                     </div>
                  </div>
               </div>
               <div class="item slide5">
                  <div class="container">
                     <div class="content">
                        <img src="assets/img/home/slider/maxmold-logo.png" alt="" srcset="">
                        <h1>End-to-End Intelligence. Strategic Insights. Maximum Value.</h1>
                        <p>Digitalis your Mold Management</p>
                        <a href="maxmold.php" class="read_more">Explore More</a>
                     </div>
                  </div>
               </div>
               <div class="item slide2">
                  <div class="container">
                     <div class="content">
                        <img src="assets/img/home/slider/packfora-wh-logo.webp" alt="" srcset="">
                        <h1>School of Packaging</h1>
                        <p>Sharpen your packaging expertise with<br>industry-leading training.</p>
                        <a href="#" class="read_more">Learn More About our Training Program</a>
                     </div>
                  </div>
               </div>
               <div class="item slide3">
                  <div class="container">
                     <div class="content">
                        <img src="assets/img/home/slider/packforum.webp" alt="" srcset="">
                        <h1>Whitepaper 2024</h1>
                        <p>Stay ahead with cutting-edge packaging insights.</p>
                        <a href="#" class="read_more">Download Your Copy Now!</a>
                     </div>
                  </div>
               </div>
               <div class="item slide4">
                  <div class="container">
                     <div class="content">
                        <h1>Packaging Maturity Index</h1>
                        <p>Assess where you stand and discover new<br>growth opportunities.</p>
                        <a href="#" class="read_more">Click Below to Check Yours</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- ==== End Slider ==== -->
         <!-- ==== Start Intro ==== -->
         <section class="introWrapp">
            <div class="container">
               <div class="row">
                  <div class="box_wrapp">
                     <div class="box-container">
                        <?php
                           $query = "SELECT * FROM tbl_impact_boxes WHERE is_delete = '1' ORDER BY id ASC";
                           $result = mysqli_query($conn, $query);
                           
                           $impact_boxes = [];
                           if ($result && mysqli_num_rows($result) > 0) {
                               while ($row = mysqli_fetch_assoc($result)) {
                                   $impact_boxes[] = $row;
                               }
                           }
                           
                           foreach ($impact_boxes as $index => $row):
                                // Use different class for the second box
                           $boxClass = ($index == 1) ? 'box-inner2' : 'box-inner1';
                           ?>
                        <div class="box">
                           <div class="box-inner <?= $boxClass ?>">
                              <div class="box-front">
                                 <h3><?= nl2br($row['front_heading']); ?></h3>
                                 <p class="title-font"><?= nl2br($row['front_value']); ?></p>
                              </div>
                              <div class="box-back">
                                 <p class="title-font"><?= $row['back_description']; ?></p>
                                 <a href="<?= $row['link']; ?>" target="_blank">
                                    <h3>Learn More</h3>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- ==== End Intro ==== -->
         <!-- ==== Start Services ==== -->
            <?php
               $orderedIds = [5, 7, 2, 3, 6, 1, 8, 9]; // strict order
               $idsIn = implode(',', $orderedIds);
               $services = [];

               $sql = "SELECT * FROM tbl_services WHERE id IN ($idsIn) AND is_delete = 1";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       $services[$row['id']] = $row; // store by ID
                   }
               }

               // Preserve custom sequence
               $orderedServices = [];
               foreach ($orderedIds as $id) {
                   if (isset($services[$id])) {
                       $orderedServices[] = $services[$id];
                   }
               }

               $firstBatch = array_slice($orderedServices, 0, 5); // First visible 5
               $additionalBatch = array_slice($orderedServices, 5); // Load more
               ?>

       <div class="services-container"
         style="background-image: url('assets/img/home/services-bg.webp'); background-position: top right;">
         <div class="all-services">
            <div class="container">
               <div class="row">
                  <h2 class="service-title mb-3 wow fadeIn">Our Services</h2>
                  <p class="service-info mb-4 wow fadeInUp" data-wow-delay="0.2s">Our company unites
                     multi-disciplinary expertise across the
                     entire packaging value chain to create packaging solutions that are innovative,
                     sustainable, and tailored to our clients' needs.
                  </p>
               </div>
               <div class="row">
                   <?php foreach ($firstBatch as $index => $service): ?>
                       <div class="col-lg-4">
                           <div class="services-card mt-2 mb-4 wow fadeInUp slow" data-wow-delay="0.<?= $index + 2 ?>s">
                               <div>
                                   <a href="<?= htmlspecialchars($service['link']) ?>" <?= ($service['service_name'] === 'MaxMold') ? 'target="_blank"' : '' ?>>
                                       <div class="service-img">
                                           <img src="<?= BASE_URL. htmlspecialchars($service['image']) ?>" class="w-100">
                                       </div>
                                       <div class="service-content">
                                           <h4 class="mb-2"><?= htmlspecialchars($service['service_name']) ?></h4>
                                           <p><?= htmlspecialchars($service['description']) ?></p>
                                       </div>
                                   </a>
                               </div>
                           </div>
                       </div>
                   <?php endforeach; ?>

                   <!-- Load More Card -->
                   <div class="col-lg-4">
                       <div class="wow fadeInUp slow" data-wow-delay="0.6s">
                           <a href="#" class="text-decoration-none d-block h-100 load-more-clickable"
                              onclick="toggleMoreServices(event)">
                               <div class="services-card more-services-card mt-2 mb-4" style="background-color: #2e3e8f;">
                                   <div class="service-content text-white d-flex justify-content-center flex-column h-100">
                                       <h2 class="mb-4 load-more-text" id="loadMoreText">
                                           For More<br>Services<br>Click here <span id="plusIcon" class="fa fa-chevron-down"></span>
                                       </h2>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>

               <!-- Additional Services -->
               <div class="row additional-services" id="additionalServices" style="display: none;">
                   <?php foreach ($additionalBatch as $service): ?>
                       <div class="col-lg-4">
                           <div class="services-card mt-2 mb-4 wow fadeInUp slow" data-wow-delay="0.2s">
                               <div>
                                   <a href="<?= htmlspecialchars($service['link']) ?>">
                                       <div class="service-img">
                                           <img src="<?= BASE_URL. htmlspecialchars($service['image']) ?>" class="w-100">
                                       </div>
                                       <div class="service-content">
                                           <h4 class="mb-2"><?= htmlspecialchars($service['service_name']) ?></h4>
                                           <p><?= htmlspecialchars($service['description']) ?></p>
                                       </div>
                                   </a>
                               </div>
                           </div>
                       </div>
                   <?php endforeach; ?>
               </div>

            </div>
         </div>
      </div>
         <!-- ==== End Services ==== -->
         <!-- ==== Start clients ==== -->
         <?php
            // Connect to DB (assumes $conn is defined)
            $sql = "SELECT * FROM our_clients WHERE is_delete = '1' ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);
            ?>
         <div class="clients" id="client">
            <div class="clients-ds py-5">
               <div class="container">
                  <h2 class="impact-title mb-4 wow fadeIn">Our Clients</h2>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="owl-carousel row sm-marg clientOwl wow fadeIn" data-wow-delay="0.2s">
                           <?php while ($row = mysqli_fetch_assoc($result)) {
                              $img = !empty($row['image']) ? $row['image'] : 'assets/img/default-client.webp';
                              ?>
                           <div class="col-lg md-mb30">
                              <div class="item d-flex align-items-center justify-content-center">
                                 <div class="img">
                                    <img src="<?= BASE_URL . $img; ?>" alt="Client Logo">
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ==== End clients ==== -->
         <!-- ==================== Start Impact ==================== -->
         <?php
            // Fetch active impact sections from the database
            $sql = "SELECT * FROM tbl_impact_sections WHERE is_delete = '1' ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);
            ?>
         <div class="our-impact py-5">
            <div class="container">
               <h2 class="impact-title mb-4 wow fadeIn">Our Impact</h2>
            </div>
            <div class="container-fluid p-0">
               <div class="scroll-section pb-5">
                  <div class="image-container">
                     <?php while ($row = mysqli_fetch_assoc($result)): 
                        $img = !empty($row['image']) ? $row['image'] : base_url('assets/img/default-impact.webp');
                        ?>
                     <div class="image-column">
                        <div class="image-wrapper">
                           <img src="<?= BASE_URL . $img ?>" alt="<?= htmlspecialchars($row['heading']) ?>">
                           <h2 class="heading"><?= htmlspecialchars($row['heading']) ?></h2>
                           <p class="sub-text"><?= htmlspecialchars($row['sub_text']) ?></p>
                           <div class="overlay">
                              <div class="text">
                                 <h3 class="values"><?= htmlspecialchars($row['value1_title']) ?></h3>
                                 <p class="values-content"><?= htmlspecialchars($row['value1_description']) ?></p>
                              </div>
                              <div class="text">
                                 <h3 class="values"><?= htmlspecialchars($row['value2_title']) ?></h3>
                                 <p class="values-content"><?= htmlspecialchars($row['value2_description']) ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php endwhile; ?>
                  </div>
               </div>
            </div>
         </div>
         <!-- ==================== End Impact ==================== -->
         <!-- ==== Start Case Studies ==== -->
        <?php
         $caseStudies = [];
         $sql = "SELECT * FROM tbl_case_study WHERE is_delete = 1 ORDER BY date DESC";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $caseStudies[] = $row;
             }
         }
         ?>
         <section class="case-study whiteBg">
             <div class="container">
                 <h2 class="sec-title mb-4 wow fadeIn">Case Studies</h2>
             </div>
             <div class="container-fluid p-0">
                 <div class="gallery">
                     <div class="owl-carousel case-study-carousel owl-theme wow zoomIn">
                         <?php foreach ($caseStudies as $case): ?>
                             <div class="item" style="background-image: url('<?= BASE_URL. htmlspecialchars($case['image']) ?>');">
                                 <div class="slide-content">
                                     <div class="content-box">
                                         <div>
                                             <h2><?= htmlspecialchars($case['description']) ?></h2>
                                         </div>
                                         <a href="<?= htmlspecialchars($case['link']) ?>">
                                             <button class="read-more-btn">Read Full Case Study</button>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>
         </section>

         <!-- ==== End Case Studies ==== -->
         <!-- ==== Start Blogs ==== -->
         <?php
            $blogs = [];
            $sql = "SELECT * FROM tbl_knowledge_centre WHERE is_delete = 1 ORDER BY date DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $blogs[] = $row;
                }
            }
            ?>
            <section class="blog-ds">
                <div class="blog-slider py-5" id="blogs">
                    <div class="container">
                        <h2 class="blog-title mb-4">Knowledge Centre</h2>
                        <div class="owl-carousel owl-theme blogs-slider">
                            <?php
                            foreach ($blogs as $index => $blog):
                                // Optional: slugify or use a dynamic link builder if blog content pages are dynamic
                                $blogLink = "blog" . ($index + 1) . ".php"; // Adjust if using `slug` column
                                $formattedDate = date("d/m/Y", strtotime($blog['date']));
                            ?>
                                <a href="<?= htmlspecialchars($blogLink) ?>">
                                    <div class="blog-item wow fadeInUp" data-wow-delay="0.<?= $index + 2 ?>s">
                                        <img src="<?= BASE_URL. htmlspecialchars($blog['image']) ?>" alt="Blog Thumbnail" class="blog-image">
                                        <div class="blog-date"><?= $formattedDate ?></div>
                                        <div class="blog-description"><?= htmlspecialchars($blog['title']) ?></div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

         <!-- ==== End Blogs ==== -->
         <!-- ==== Start Contact ==== -->
         <section class="contact-sa">
            <div class="container">
               <div class="">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="info">
                           <div class="sec-head d-flex wow fadeInUp" data-wow-delay="0.2s">
                              <h6 class="title-font">Lets Connect</h6>
                              <img src="assets/img/shape/lets-connect.png" alt="">
                           </div>
                           <div class="sec-head me-5 wow fadeInUp" data-wow-delay="0.4s">
                              <h4>Reach out to discover how Packfora can address your unique challenges
                                 and drive
                                 sustainable success.
                              </h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="contact-form wow zoomIn" data-wow-delay="0.2s">
                           <form id="contact_request" method="post" action="javascript:void(0)" novalidate="true">
                              <div class="messages"></div>
                              <div class="controls row">
                                 <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                       <label for="form_name">Full Name<span class="star">*</span></label>
                                       <input id="form_name" type="text" name="name"
                                          placeholder="Your full name" required="required">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                       <label for="form_email">Email Address<span class="star">*</span></label>
                                       <input id="form_email" type="email" name="email"
                                          placeholder="Your email address" required="required">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group mt-2 mb-4">
                                       <label for="phone_number">Phone Number<span
                                          class="star">*</span></label>
                                       <div style="display: flex; gap: 8px;">
                                          <!-- Country Code Dropdown -->
                                          <select name="country_code" id="country_code" required
                                             style="max-width: 130px;">
                                             <option value="">Select</option>
                                             <option value="+1">+1 (USA/Canada)</option>
                                             <option value="+7">+7 (Russia)</option>
                                             <option value="+20">+20 (Egypt)</option>
                                             <option value="+27">+27 (South Africa)</option>
                                             <option value="+30">+30 (Greece)</option>
                                             <option value="+31">+31 (Netherlands)</option>
                                             <option value="+32">+32 (Belgium)</option>
                                             <option value="+33">+33 (France)</option>
                                             <option value="+34">+34 (Spain)</option>
                                             <option value="+36">+36 (Hungary)</option>
                                             <option value="+39">+39 (Italy)</option>
                                             <option value="+40">+40 (Romania)</option>
                                             <option value="+41">+41 (Switzerland)</option>
                                             <option value="+43">+43 (Austria)</option>
                                             <option value="+44">+44 (UK)</option>
                                             <option value="+45">+45 (Denmark)</option>
                                             <option value="+46">+46 (Sweden)</option>
                                             <option value="+47">+47 (Norway)</option>
                                             <option value="+48">+48 (Poland)</option>
                                             <option value="+49">+49 (Germany)</option>
                                             <option value="+51">+51 (Peru)</option>
                                             <option value="+52">+52 (Mexico)</option>
                                             <option value="+53">+53 (Cuba)</option>
                                             <option value="+54">+54 (Argentina)</option>
                                             <option value="+55">+55 (Brazil)</option>
                                             <option value="+56">+56 (Chile)</option>
                                             <option value="+57">+57 (Colombia)</option>
                                             <option value="+58">+58 (Venezuela)</option>
                                             <option value="+60">+60 (Malaysia)</option>
                                             <option value="+61">+61 (Australia)</option>
                                             <option value="+62">+62 (Indonesia)</option>
                                             <option value="+63">+63 (Philippines)</option>
                                             <option value="+64">+64 (New Zealand)</option>
                                             <option value="+65">+65 (Singapore)</option>
                                             <option value="+66">+66 (Thailand)</option>
                                             <option value="+81">+81 (Japan)</option>
                                             <option value="+82">+82 (South Korea)</option>
                                             <option value="+84">+84 (Vietnam)</option>
                                             <option value="+86">+86 (China)</option>
                                             <option value="+90">+90 (Turkey)</option>
                                             <option value="+91" selected>+91 (India)</option>
                                             <option value="+92">+92 (Pakistan)</option>
                                             <option value="+93">+93 (Afghanistan)</option>
                                             <option value="+94">+94 (Sri Lanka)</option>
                                             <option value="+95">+95 (Myanmar)</option>
                                             <option value="+98">+98 (Iran)</option>
                                             <option value="+211">+211 (South Sudan)</option>
                                             <option value="+212">+212 (Morocco)</option>
                                             <option value="+213">+213 (Algeria)</option>
                                             <option value="+216">+216 (Tunisia)</option>
                                             <option value="+218">+218 (Libya)</option>
                                             <option value="+220">+220 (Gambia)</option>
                                             <option value="+221">+221 (Senegal)</option>
                                             <option value="+222">+222 (Mauritania)</option>
                                             <option value="+223">+223 (Mali)</option>
                                             <option value="+224">+224 (Guinea)</option>
                                             <option value="+225">+225 (Ivory Coast)</option>
                                             <option value="+226">+226 (Burkina Faso)</option>
                                             <option value="+227">+227 (Niger)</option>
                                             <option value="+228">+228 (Togo)</option>
                                             <option value="+229">+229 (Benin)</option>
                                             <option value="+230">+230 (Mauritius)</option>
                                             <option value="+231">+231 (Liberia)</option>
                                             <option value="+232">+232 (Sierra Leone)</option>
                                             <option value="+233">+233 (Ghana)</option>
                                             <option value="+234">+234 (Nigeria)</option>
                                             <option value="+235">+235 (Chad)</option>
                                             <option value="+236">+236 (CAR)</option>
                                             <option value="+237">+237 (Cameroon)</option>
                                             <option value="+238">+238 (Cape Verde)</option>
                                             <option value="+239">+239 (Sao Tome & Principe)</option>
                                             <option value="+240">+240 (Equatorial Guinea)</option>
                                             <option value="+241">+241 (Gabon)</option>
                                             <option value="+242">+242 (Congo)</option>
                                             <option value="+243">+243 (DR Congo)</option>
                                             <option value="+244">+244 (Angola)</option>
                                             <option value="+245">+245 (Guinea-Bissau)</option>
                                             <option value="+246">+246 (BIOT)</option>
                                             <option value="+248">+248 (Seychelles)</option>
                                             <option value="+249">+249 (Sudan)</option>
                                             <option value="+250">+250 (Rwanda)</option>
                                             <option value="+251">+251 (Ethiopia)</option>
                                             <option value="+252">+252 (Somalia)</option>
                                             <option value="+253">+253 (Djibouti)</option>
                                             <option value="+254">+254 (Kenya)</option>
                                             <option value="+255">+255 (Tanzania)</option>
                                             <option value="+256">+256 (Uganda)</option>
                                             <option value="+257">+257 (Burundi)</option>
                                             <option value="+258">+258 (Mozambique)</option>
                                             <option value="+260">+260 (Zambia)</option>
                                             <option value="+261">+261 (Madagascar)</option>
                                             <option value="+263">+263 (Zimbabwe)</option>
                                             <option value="+264">+264 (Namibia)</option>
                                             <option value="+265">+265 (Malawi)</option>
                                             <option value="+266">+266 (Lesotho)</option>
                                             <option value="+267">+267 (Botswana)</option>
                                             <option value="+268">+268 (Eswatini)</option>
                                             <option value="+269">+269 (Comoros)</option>
                                             <option value="+290">+290 (Saint Helena)</option>
                                             <option value="+291">+291 (Eritrea)</option>
                                             <option value="+297">+297 (Aruba)</option>
                                             <option value="+298">+298 (Faroe Islands)</option>
                                             <option value="+299">+299 (Greenland)</option>
                                             <option value="+350">+350 (Gibraltar)</option>
                                             <option value="+351">+351 (Portugal)</option>
                                             <option value="+352">+352 (Luxembourg)</option>
                                             <option value="+353">+353 (Ireland)</option>
                                             <option value="+354">+354 (Iceland)</option>
                                             <option value="+355">+355 (Albania)</option>
                                             <option value="+356">+356 (Malta)</option>
                                             <option value="+357">+357 (Cyprus)</option>
                                             <option value="+358">+358 (Finland)</option>
                                             <option value="+359">+359 (Bulgaria)</option>
                                             <option value="+370">+370 (Lithuania)</option>
                                             <option value="+371">+371 (Latvia)</option>
                                             <option value="+372">+372 (Estonia)</option>
                                             <option value="+373">+373 (Moldova)</option>
                                             <option value="+374">+374 (Armenia)</option>
                                             <option value="+375">+375 (Belarus)</option>
                                             <option value="+376">+376 (Andorra)</option>
                                             <option value="+377">+377 (Monaco)</option>
                                             <option value="+378">+378 (San Marino)</option>
                                             <option value="+380">+380 (Ukraine)</option>
                                             <option value="+381">+381 (Serbia)</option>
                                             <option value="+382">+382 (Montenegro)</option>
                                             <option value="+383">+383 (Kosovo)</option>
                                             <option value="+385">+385 (Croatia)</option>
                                             <option value="+386">+386 (Slovenia)</option>
                                             <option value="+387">+387 (Bosnia & Herzegovina)</option>
                                             <option value="+389">+389 (North Macedonia)</option>
                                             <option value="+420">+420 (Czech Republic)</option>
                                             <option value="+421">+421 (Slovakia)</option>
                                             <option value="+423">+423 (Liechtenstein)</option>
                                          </select>
                                          <!-- Phone number input -->
                                          <input type="text" id="phone_number" name="phone"
                                             placeholder="Your phone number" required class="NumberOnly"
                                             style="flex: 1;" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group mt-2 mb-4">
                                       <label for="form_services">Services<span class="star">*</span></label>
                                       <select id="form_services" name="services" required>
                                          <option value="" disabled selected>Select a
                                             service
                                          </option>
                                          <option value="Talent Flex">Talent Flex</option>
                                          <option value="Sustainability">Sustainability</option>
                                          <option value="Supply Chain Automation">Supply Chain Automation
                                          </option>
                                          <option value="Product Innovation">Product Innovation</option>
                                          <option value="Design to Value">Design to Value</option>
                                          <option value="Mold Management">Mold Management</option>
                                          <option value="Packaging Innovation & Engineering">Packaging
                                             Innovation & Engineering
                                          </option>
                                          <option value="Packaging Procurement">Packaging Procurement</option>
                                          <option value="MaxMold">MaxMold</option>
                                          <option value="Specification Management">Specification Management
                                          </option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group mt-2 mb-4">
                                       <label for="form_message">Message</label>
                                       <textarea id="form_message" name="message"
                                          placeholder="Write your message here..." rows="4"
                                          required="required"></textarea>
                                    </div>
                                    <div class="submit-button">
                                       <button type="submit" class="submit">Submit</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- ==== End Contact ==== -->
         <?php include('footer.php'); ?>
      </main>
      <!-- jQuery -->
      <script src="assets/common/js/lib/jquery-3.6.0.min.js"></script>
      <!-- plugins -->
      <script src="assets/common/js/lib/plugins.js"></script>
      <!-- common scripts -->
      <script src="assets/common/js/common_scripts.js"></script>
      <!-- custom scripts -->
      <script src="assets/js/scripts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="assets/view_js/contact_request.js"></script>
      <script>
         let servicesVisible = false;
         
         function toggleMoreServices(event) {
         event.preventDefault();
         
         const section = document.getElementById('additionalServices');
         const loadMoreText = document.getElementById('loadMoreText');
         const plusIcon = document.getElementById('plusIcon');
         
         if (!servicesVisible) {
          section.classList.remove('d-none');
          loadMoreText.innerHTML = 'For More<br>Services<br>Click here <span id="plusIcon">-</span>';
          servicesVisible = true;
         } else {
          section.classList.add('d-none');
          loadMoreText.innerHTML = 'For More<br>Services<br>Click here <span id="plusIcon">+</span>';
          servicesVisible = false;
         }
         }
         
         
      </script>
   </body>
</html>