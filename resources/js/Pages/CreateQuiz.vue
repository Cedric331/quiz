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
                
               <div class="form-floating">
                 <select class="form-select" id="theme" aria-label="Theme du questionnaire">
                   <option disabled selected>Choisir un thème</option>
                   <option  v-for="theme in themes" :key="theme.id"  :value="theme.id">{{theme.titre}}</option>
                 </select>
                 <label for="theme">Thème du questionnaire</label>
               </div>

               <div class="form-floating my-3">
                 <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
                 <label for="titre">Titre du questionnaire</label>
               </div>

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
  props: ['themes'],
  
}
</script>