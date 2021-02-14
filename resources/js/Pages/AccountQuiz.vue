<template>
   <div>
      <div class="container my-5">
        <section class="p-5 z-depth-1">

          <div class="row d-flex justify-content-center bg-white p-2">
            <h3 class="text-center font-weight-bold mb-5">Compteur</h3>
            <div class="col-md-6 col-lg-3 mb-4 text-center">
              <h4 class="h1 font-weight-normal mb-3">
                <i class="fas fa-file-alt indigo-text"></i>
                <span class="d-inline-block count-up" data-from="0" data-to="100" data-time="2000">{{nbQuiz}}</span>
              </h4>
              <p class="font-weight-normal text-muted">Nombre de quiz que vous avez crée</p>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 text-center">
              <h4 class="h1 font-weight-normal mb-3">
                <i class="fas fa-layer-group indigo-text"></i>
                <span class="d-inline-block count1" data-from="0" data-to="250" data-time="2000">{{nbQuizFinish}}</span>
              </h4>
              <p class="font-weight-normal text-muted">Nombre de fois où les autres utilisateurs ont utilisés vos quiz</p>
            </div>

          </div>

        </section>
      </div>
   </div>
</template>


<script>
export default {
  data () {
    return {
       quiz: this.questionnaires,
       nbQuiz: 0,
       nbQuizFinish: 0,
    }
  },
  mounted() {
   this.nbQuiz = this.questionnaires.length
   this.nbQuizFinish = this.counter
  },
  props: ['questionnaires','counter'],
    
}
</script>