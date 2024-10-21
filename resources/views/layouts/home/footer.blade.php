<!-- partial:partials/_footer.blade.php -->
<footer class="footer">
   
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-left text-sm-left d-block d-sm-inline-block">
            Website Kerdos adalah platform digital yang mempermudah pelaporan<br> dan penilaian kinerja dosen
            di perguruan tinggi Jawa Timur.
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
            Copyright © 2024. All rights reserved.
            <div class="social-icons mt-2">
                <a href="tel:+62315925418  " target="_blank">
                    <img src="{{ asset('images/icon-phone.png') }}" alt="Telepon" />
                </a>  
                <a href="https://maps.app.goo.gl/hcmHH8ytbbRpNCf7A?g_st=com.google.maps.preview.copy" target="_blank">
                    <img src="{{ asset('images/icon-maps.png') }}" alt="Peta" />
                </a>  
                <a href="mailto:ult.lldikti7@ristekdikti.go.id" target="_blank">
                    <img src="{{ asset('images/icon-gmail.png') }}" alt="Gmail" />
                </a>  
                <a href="https://youtube.com/@lldikti7?si=eZtLBwFIvW3r32bY" target="_blank">
                    <img src="{{ asset('images/icon-youtube.png') }}" alt="YouTube" />
                </a>  
                <a href="https://www.instagram.com/lldikti7?igsh=MXUxYnR0d2d4OG04aA==" target="_blank">
                    <img src="{{ asset('images/icon-instagram.png') }}" alt="Instagram" />
                </a>                
            </div>
        </span>
    </div>
    <style>
        .social-icons {
            margin-top: 5px;
        }

        .social-icons a {
            margin: 0 5px;
            display: inline-block;
            text-decoration: none;
            color: #333;
        }

        .social-icons img {
            width: 24px;  /* Set lebar gambar */
            height: 24px; /* Set tinggi gambar */
            margin: 0 5px; /* Optional: menambahkan margin antara ikon */
        }

        .social-icons a:hover {
            color: #007bff;
        }
    </style>
</footer>
<!-- partial -->
