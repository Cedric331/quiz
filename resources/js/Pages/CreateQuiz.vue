<template>
<div class="container-fluid mb-5 px-0 z-depth-1">

  <section class="p-5 text-center" 
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;">

    <form class="my-5 mx-md-5" action="">

      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">

              <form class="text-center" style="color: #757575;" action="#!">
                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Création du Quiz</h3>

                <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Email">

                <input type="password" id="defaultSubscriptionFormEmail" class="form-control" placeholder="Password">

                <div class="text-center">
                  <button type="button" class="btn btn-outline-primary btn-rounded my-4 waves-effect">Créer</button>
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
    </form>
  </section>
</div>

</template>


<script>
export default {
  props: [''],
    
}
</script>