<template>
<div class="container-fluid px-0 z-depth-1">

  <section class="text-center white-text grey p-5"
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg);height:100vh;">

    <div class="row d-flex justify-content-center my-auto">
      <div class="col-md-6">
          <h3 class="font-weight-bold">Merci</h3>
          <p style="font-size:20px;">Votre questionnaire <strong>{{ questionnaire.titre }}</strong> est maintenant disponible</p>
          <a href="/account" class="btn btn-outline-light btn-md waves-effect ml-0" role="button">Revenir</a>
      </div>
    </div>
  </section>
</div>

</template>


<script>
export default {
  props: ['questionnaire'],
 

}
</script>