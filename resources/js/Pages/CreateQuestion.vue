<template>
<div class="container-fluid px-0 z-depth-1">

  <section class="p-5 text-center" 
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;height:100vh;">

    <form class="my-5 mx-md-5" action="">

      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">

              <form class="text-center" style="color: #757575;" @submit.prevent="submit">
                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Création des questions pour le questionnaire</h3>

            <div id="myQuestion">
               <div class="form-floating">
                 <input type="text" class="form-control" id="question" :v-model="question" value="" placeholder="question">
                 <label for="question">Question </label>
                 <div v-if="erreurs && erreurs.question" class="text-danger">{{ erreurs.question[0] }}</div>
               </div>
               <div class="form-floating">
                 <input type="text" class="form-control" id="response" :v-model="response" value="" placeholder="Réponse">
                 <label for="response">Réponse </label>
                 <div v-if="erreurs && erreurs.response" class="text-danger">{{ erreurs.response[0] }}</div>
               </div>
            </div>
            
                <div class="text-center">
                  <button type="submit" class="btn btn-outline-primary btn-rounded my-4 waves-effect">Terminé</button>
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
}
</script>