<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @livewireStyles

    <title>Livewire CRUDS</title>
  </head>
  <body>
   
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-center">
                    <h1>LIVEWIRE CRUDS</h1>
                  </div>
                  <p class="text-center">Create, Read, Update, Delete and Search</p>
                @livewire('users')
            </div>
        </div>
    </div>

    @livewireScripts
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
      const createModal = new bootstrap.Modal(document.getElementById('createModal'));
      const editModal = new bootstrap.Modal(document.getElementById('editModal'));

      window.livewire.on('closeModal', () => {
          createModal.hide();
          editModal.hide();
      });
    </script>
    
  </body>
</html>