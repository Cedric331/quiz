<template>
   <div>
      <notifications group="success" position="bottom right" />
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

      <div class="container my-5">

  
  <!-- Section: Block Content -->
  <section>
    
    <div class="row">
      <div class="col-8 m-auto">
      	<div class="card card-list">
          <div class="card-header white d-flex justify-content-between align-items-center py-3">
            <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-clipboard-list pr-2"></i>Mes Quiz</p>
          
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              <li v-for="questionnaire in questionnaires" :key="questionnaire.id" class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <div class="d-inline-flex">
                  <p class="mb-0"><span class="text">{{questionnaire.titre}}</span></p>
                </div>
                <div class="tools">
                  <a href="#" @click="deleteQuiz(questionnaire.id)"><i class="far fa-trash-alt fa-1x"></i></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </section>

      </div>

   </div>
</template>


<script>
export default {
  methods: {
     deleteQuiz(id){
        axios.delete('/quiz/delete/'+id).then(res => {
           console.log(res.data)
           if (res.status == 200) {
               this.$notify({
                  group: 'success',
                  type: 'success',
                  title: 'Succès',
                  speed: 1000,
                  text: 'Quiz supprimé!',
               });
           }
        }).catch(err => {
             if (err.response.status == 401) {
               this.$notify({
                  group: 'success',
                  type: 'success',
                  title: 'Warning',
                  speed: 1000,
                  text: 'Action non autorisée!',
               });
           }
        })
     }
  },
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