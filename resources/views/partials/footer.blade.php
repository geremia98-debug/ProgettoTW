@extends('layouts.app')
@section ('footer')
<footer>
      <div id="footer-div">
        <div class="d-flex justify-content-around mt-4 py-4">
          <div class="social-box">
            <h2>Seguici sui Social</h2>
            <!-- Add social media icons and links here -->
            <div class="d-flex social">
                <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com/?lang=it"><i class="bi bi-twitter"></i></a>
            </div>
        </div>


        <div class="contact-box">
            <h2>Contatti</h2>
            <p>Telefono: 123-456-789</p>
            <p>Email: info@vagnoli.com</p>
            <p>Indirizzo: Via Autostrada, 123, 61032 Fano PU, Italia</p>
        </div>
        </div>
        
        <div class="d-flex justify-content-center">
          <p>&copy; 2023 Vagnoli - Noleggio Auto</p>
        </div>
      </div>
    </footer>
@endsection