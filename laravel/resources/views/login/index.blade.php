<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body style="background-color: rgb(216, 219, 221);">

    <div class="container rounded-3 bg-light mt-5 p-4 shadow " style="width: 500px">

        <h1 class=" text-secondary text-center fw-bold mb-5 ">login</h1>

        <form action="" method="post">
            @csrf
            <!-- User name section -->
            <div class="mx-5 my-4 ">
                <label for="username " class="form-label fw-bold ">User Name:</label>
                <div class="input-group">
                    <span class="input-group-text"> <i class="fas fa-user "></i></span>
                    <input type="text" name="uname" class="form-control rounded-end " id="uname " placeholder="Type your Username ">
                </div>
            </div>
            <!-- Password section -->
            <div class="mx-5 my- ">
                <label for="password " class="form-label fw-bold ">Password:</label>
                <div class="input-group ">
                    <span class="input-group-text "> <i class="fas fa-key "></i></span>
                    <input type="password" name='password' class="form-control rounded-end " id="password " placeholder="Type your Password ">
                </div>
            </div>

            <div class="text-end mx-5 my-3 ">
                <a class="link-danger " href="forget-pass ">Forgot Password?</a>
            </div>
            <!-- Login -->
            <div class="d-flex justify-content-center my-2 ">
                <button type="submit " class="btn btn-lg btn-primary px-sm-4 ">Login</button>
            </div>

            <div class="text-start mx-5 my-3 ">
                <a class="link-info " href="/registration">Not registered yet?</a>
            </div>

            @if (session('error')!= null)
                <div class="alert alert-warning" role="alert">
                     {{session('error')}}
                </div>
            @endif
            @if (session('msg')!= null)
                <div class="alert alert-success d-flex justify-content-center my-2" role="alert">
                    {{session('msg')}}
                </div>
            @endif



        </form>


    </div>





























    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js " integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin=" anonymous " referrerpolicy="no-referrer "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js " integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT " crossorigin="anonymous "></script>


</body>

</html>
