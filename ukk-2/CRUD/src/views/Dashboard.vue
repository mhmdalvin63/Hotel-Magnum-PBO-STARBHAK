<template>
  <div class="py-4 container-fluid">
    <div class="row">
      <h1>haiii</h1>
    </div>
  </div>
</template>
<script>
    import axios from 'axios'
    import {
        onMounted,
        ref
    } from 'vue'

    export default {
        name: 'index-kamar',

        setup() {

            //reactive state
            let kamar = ref([])

            //mounted
            onMounted(() => {

                //get API from Laravel Backend
                axios.get('http://localhost:8000/api/kamar')
                    .then(response => {

                        //assign state kamars with response data
                        kamar.value = response.data.data

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            })


            //method delete
            function kamarDelete(id) {

                //delete data post by ID
                axios.delete(`http://localhost:8000/api/kamar/${id}`)
                    .then(() => {

                        // splice posts
                        const index = this.kamar.findIndex(kamar => kamar.id === id) // find the post index
                        if (~index) {
                            // if the post exists in array
                            this.kamar.splice(index, 1)
                        }

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            }



            //return
            return {
                kamar,
                kamarDelete
            }

        }

    }
</script>
