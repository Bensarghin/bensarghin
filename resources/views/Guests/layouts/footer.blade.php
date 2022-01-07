</div>
<footer>
  <p class="text-center">
    Copyright 2022 bensarghin hamid: all rights reserved
  </p>
</footer>
    <script src="{{asset('js/bundle.js')}}"></script>
    <script src="{{asset('js/app.js')}}">
    </script>
    <script src="{{asset('js/navbar.js')}}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });

    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    </script>
    </body>
</html>