<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
</head>
<body>
    <form action="" method="">
        <select data-placeholder="Begin typing a name to filter..." multiple class="form-control chosen-select" name="test">
          <option value=""></option>
          <option>American Black Bear</option>
          <option>Asiatic Black Bear</option>
          <option>Brown Bear</option>
          <option>Giant Panda</option>
          <option>Sloth Bear</option>
          <option>Sun Bear</option>
          <option>Polar Bear</option>
          <option>Spectacled Bear</option>
        </select>
        <input type="button" class="btn btn-sucess">Submit
      </form>

</body>
</html>

<script>
     $(".chosen-select").chosen({
      no_results_text: "Oops, nothing found!"
      })
</script>


{{-- <form action="">
  <select data-palceholder="Begin typing a name to filter..." multiple class="form-control chosen-select" name="test" id="">
    <option value=""></option>
    <option value="American Black Bear"></option>
    <option value="Asiartic Black Bear"></option>
    <option value="Brown Bear"></option>
    <option value="Giant Panda"></option>
    <option value="Sloth Bear"></option>
    <option value="Sun Bear"></option>
    <option value="Polar Bear"></option>
    <option value="Spectacled Bear"></option>
  </select>
  <label for="name">
   <input type="text" name="name" id="name" placeholder="Enter Name">
  </label>

  <label for="gender">
    <input type="radio" name="gender" id="gender">Male
    <input type="radio" name="gender" id="gender">Female
  </label>

  <label for="hobby">
    <input type="checkbox" name="hobby" id="hobby">Reading
    <input type="checkbox" name="hobby" id="hobby">Dancing
    <input type="checkbox" name="hobby" id="hobby">Typing
    <input type="checkbox" name="hobby" id="hobby">Writing
  </label>

  <label for="email">
    <input type="email" name="email" id="email" placeholder=" Enter Email">
  </label>

  <label for="password">
    <input type="password" name="password" id="password" placeholder="Enter Password">
  </label>

  <label for="mobile">
    <input type="text" name="mobileno" id="mobileno" palceholder="Enater Mobile Number">
  </label>

  <label for="city">
    <select name="city" id="city">
      <option value="Amreli">Amreli</option>
      <option value="Surat">Surat</option>
      <option value="Ahemdabad">Ahemdabad</option>
      <option value="Baroda">Baroda</option>
      <option value="Anand">Anand</option>
      <option value="Bhuj">Bhuj</option>
    </select>
  </label>

  <label for="address">
    <textarea name="address" id="address" cols="30" rows="10"></textarea>
  </label>

  <label for="comments">
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
  </label>

  <label for="age">
    <input type="number" name="age" id="age" min="1" max="100">
  </label>

 <button type="submit" class="btn btn-sucess">Submit</button>
</form> --}}

