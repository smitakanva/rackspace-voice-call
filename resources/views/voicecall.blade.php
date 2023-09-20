<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    #frm-create-post label.error {
        color: red;
    }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 50px;">
        <h4 style="text-align: center;"> RackSpace Apis Call</h4>
        
            <button type="button" class="btn btn-primary" id="make-call-button" >Start Call</button>
            
    </div>

  

    <script type="text/javascript">

      
const makeCallButton = document.getElementById('make-call-button');

makeCallButton.addEventListener('click', () => {
    const to = '+917719462335'; // Replace with the recipient's phone number
    fetch(`/make-call?to=${to}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

        
        

    </script>
</body>

</html>