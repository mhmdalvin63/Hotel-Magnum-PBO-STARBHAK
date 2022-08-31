<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>TAMBAH KAMAR</h4>
                        <hr>

                        <form @submit.prevent="store">
                            <div class="form-group">
                                <label for="namapemesan" class="font-weight-bold">Nama Pemesan :</label>
                                <input type="text" class="form-control" v-model="tamu.namapemesan" placeholder="Masukkan Nama Pemesan">
                                <!-- validation -->
                                <div v-if="validation.namapemesan" class="mt-2 alert alert-danger">
                                    {{ validation.namapemesan[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email :</label>
                                <input type="text" class="form-control" v-model="tamu.email" placeholder="Masukkan Email">
                                <!-- validation -->
                                <div v-if="validation.email" class="mt-2 alert alert-danger">
                                    {{ validation.email[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="notelp" class="font-weight-bold">No Telepon :</label>
                                <input type="number" class="form-control" v-model="tamu.notelp" placeholder="Masukkan Nomor Telepon">
                                <!-- validation -->
                                <div v-if="validation.notelp" class="mt-2 alert alert-danger">
                                    {{ validation.notelp[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namatamu" class="font-weight-bold">Nama Tamu :</label>
                                <input type="text" class="form-control" v-model="tamu.namatamu" placeholder="Masukkan Nama Tamu">
                                <!-- validation -->
                                <div v-if="validation.namatamu" class="mt-2 alert alert-danger">
                                    {{ validation.namatamu[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tipekamar" class="font-weight-bold">Tipe Kamar :</label>
                                <input type="text" class="form-control" v-model="tamu.tipekamar" placeholder="Masukkan Tipe Kamar">
                                <!-- validation -->
                                <div v-if="validation.tipekamar" class="mt-2 alert alert-danger">
                                    {{ validation.tipekamar[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tglcekin" class="font-weight-bold">Tgl.CheckIn :</label>
                                <input type="date" class="form-control" v-model="tamu.tglcekin" placeholder="Masukkan Jumlah Kamar">
                                <!-- validation -->
                                <div v-if="validation.tglcekin" class="mt-2 alert alert-danger">
                                    {{ validation.tglcekin[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tglcekout" class="font-weight-bold">Tgl.CheckOut :</label>
                                <input type="date" class="form-control" v-model="tamu.tglcekout" placeholder="Masukkan Jumlah Kamar">
                                <!-- validation -->
                                <div v-if="validation.tglcekout" class="mt-2 alert alert-danger">
                                    {{ validation.tglcekout[0] }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jmlkamar" class="font-weight-bold">Jumlah Kamar :</label>
                                <input type="number" class="form-control" v-model="tamu.jmlkamar" placeholder="Masukkan Jumlah Kamar">
                                <!-- validation -->
                                <div v-if="validation.jmlkamar" class="mt-2 alert alert-danger">
                                    {{ validation.jmlkamar[0] }}
                                </div>
                            </div>
                            
                            <router-link :to="{name: 'tamu.index-tamu'}" class="btn btn-md btn-success my-3">KEMBALI</router-link>
                            <button type="submit" class="btn btn-primary mx-3">SIMPAN</button>
                        </form>                        

                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {
    name: 'create-tamu',

    setup() {

        //state posts
        const tamu = reactive({
            namapemesan: '',
            email: '',
            notelp: '',
            namatamu: '',
            tipekamar: '',
            tglcekin: '',
            tglcekout: '',
            jmlkamar: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //method store
        function store() {

            let namapemesan   = tamu.namapemesan
            let email = tamu.email
            let notelp = tamu.notelp
            let namatamu = tamu.namatamu
            let tipekamar = tamu.tipekamar
            let tglcekin = tamu.tglcekin
            let tglcekout = tamu.tglcekout
            let jmlkamar = tamu.jmlkamar

            axios.post('http://localhost:8000/api/tamu', {
                namapemesan: namapemesan,
                email: email,
                notelp: notelp,
                namatamu: namatamu,
                tipekamar: tipekamar,
                tglcekin: tglcekin,
                tglcekout: tglcekout,
                jmlkamar: jmlkamar,
            }).then(() => {

                //redirect ke post index
                router.push({
                    name: 'tamu.index-tamu'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            tamu,
            validation,
            router,
            store
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>