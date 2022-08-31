<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>EDIT KAMAR</h4>
                        <hr>

                        <form @submit.prevent="update">
                            <div class="form-group">
                                <label for="tipe_kamar" class="font-weight-bold">Tipe Kamar :</label>
                                <input type="text" class="form-control" v-model="kamar.tipe_kamar" placeholder="Masukkan Tipe Kamar">
                                <!-- validation -->
                                <div v-if="validation.tipe_kamar" class="mt-2 alert alert-danger">
                                    {{ validation.tipe_kamar[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_fasilitas" class="font-weight-bold">Fasilitas Kamar :</label>
                                <input type="text" class="form-control" v-model="kamar.nama_fasilitas" placeholder="Masukkan Nama Fasilitas Kamar">
                                <!-- validation -->
                                <div v-if="validation.nama_fasilitas" class="mt-2 alert alert-danger">
                                    {{ validation.nama_fasilitas[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kamar" class="font-weight-bold">Jumlah Kamar :</label>
                                <input type="number" class="form-control" v-model="kamar.jumlah_kamar" placeholder="Masukkan Jumlah Kamar">
                                <!-- validation -->
                                <div v-if="validation.jumlah_kamar" class="mt-2 alert alert-danger">
                                    {{ validation.jumlah_kamar[0] }}
                                </div>
                            </div>
                            <router-link :to="{name: 'kamar.index-kamar'}" class="btn btn-md btn-success">KEMBALI</router-link>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {
    name: 'edit-kamar',

    setup() {

        //state posts
        const kamar = reactive({
            tipe_kamar: '',
            nama_fasilitas: '',
            jumlah_kamar: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //vue router
        const route = useRoute()

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get(`http://localhost:8000/api/kamar/${route.params.id}`)
            .then(response => {
              
              //assign state posts with response data
              kamar.tipe_kamar    = response.data.data.tipe_kamar  
              kamar.nama_fasilitas    = response.data.data.nama_fasilitas  
              kamar.jumlah_kamar    = response.data.data.jumlah_kamar  

            }).catch(error => {
                console.log(error.response.data)
            })

        })

        //method update
        function update() {

            let tipe_kamar   = kamar.tipe_kamar
            let nama_fasilitas   = kamar.nama_fasilitas
            let jumlah_kamar   = kamar.jumlah_kamar

            axios.put(`http://localhost:8000/api/kamar/${route.params.id}`, {
                tipe_kamar: tipe_kamar,
                nama_fasilitas: nama_fasilitas,
                jumlah_kamar: jumlah_kamar
            }).then(() => {

                //redirect ke post index
                router.push({
                    name: 'kamar.index-kamar'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            kamar,
            validation,
            router,
            update
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>