<?php
$tel = get_field('gramm_info','option')['tel_gramm'];
$address = get_field('gramm_info','option')['gramm_address'];
$hours_available_from = get_field('gramm_info','option')['hours_from'];
$hours_available_to = get_field('gramm_info','option')['hours_to'];
$email= get_field('gramm_info','option')['email_gramm'];
?>

<section id="contact-section">
    <div class=container-fluid>
        <div class="row">
            <div class="col-md-8 contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d776.5308621446193!2d22.4369503292467!3d38.87541734279023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135f5ac8c92b3db5%3A0x1bd323cbe48021eb!2zzqTOlc6ZIM6jz4TOtc-BzrXOrM-CIM6VzrvOu86szrTOsc-C!5e0!3m2!1sel!2sgr!4v1618735560680!5m2!1sel!2sgr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-4 contact-info">
                <h2 class="text-center pt-5 pb-5"> ΣΤΟΙΧΕΙΑ ΕΠΙΚΟΙΝΩΝΙΑΣ </h2>
                <div class="row text-center">
                    <div class="col-md-4">
                         <p class="info"><i class="fas fa-map-marker text-center mr-3"></i> Διεύθυνση </p>
                         <p> <?php echo $address;?> </p>
                    </div>
                    <div class="col-md-4">
                         <p  class="info"><i class="fas fa-phone text-center mr-3"></i> Τηλέφωνα </p>
                         <p> <?php echo $tel;?> </p>
                    </div>
                    <div class="col-md-4">
                         <p class="info"><i class="fas fa-at text-center mr-3"></i>Email</p>
                         <a style="color:#fff; text-decoration:none;" href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
                    </div>
                </div>
                <p class="text-center info"><i class="fas fa-user-clock"></i> Η γραμματεία εξυπηρετεί τους φοιτητές <?php echo $hours_available_from;?> - <?php echo $hours_available_to;?></p>
            <div>
        </div>
    </div>
</section>