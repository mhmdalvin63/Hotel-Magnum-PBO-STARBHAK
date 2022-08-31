<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>DATA TAMU</h4>
                        <hr>

                        <router-link :to="{name: 'tamu.create-tamu'}" class="btn btn-md btn-success">TAMBAH DATA TAMU
                        </router-link>

                        <table class="table table-striped table-responsive mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Nama Tamu</th>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Tgl.CheckIn</th>
                                    <th scope="col">Tgl.CheckOut</th>
                                    <th scope="col">Jumlah Kamar</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tamu, index) in tamu" :key="index">
                                    <td>{{ tamu.namapemesan }}</td>
                                    <td>{{ tamu.email }}</td>
                                    <td>{{ tamu.notelp }}</td>
                                    <td>{{ tamu.namatamu }}</td>
                                    <td>{{ tamu.tipekamar }}</td>
                                    <td>{{ tamu.tglcekin }}</td>
                                    <td>{{ tamu.tglcekout }}</td>
                                    <td>{{ tamu.jmlkamar }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'tamu.edit-tamu', params:{id: tamu.id }}"
                                            class="btn btn-sm btn-primary mr-1">EDIT</router-link>
                                        <button @click.prevent="tamuDelete(tamu.id)"
                                            class="btn btn-sm btn-danger ml-1">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <router-link :to="{name: 'index-home'}" class="btn btn-success">Kembali</router-link> -->

                    </div>
                </div>
            </div>
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
        name: 'index-tamu',

        setup() {

            //reactive state
            let tamu = ref([])

            //mounted
            onMounted(() => {

                //get API from Laravel Backend
                axios.get('http://localhost:8000/api/tamu')
                    .then(response => {

                        //assign state kamars with response data
                        tamu.value = response.data.data

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            })


            //method delete
            function tamuDelete(id) {

                //delete data post by ID
                axios.delete(`http://localhost:8000/api/tamu/${id}`)
                    .then(() => {

                        // splice posts
                        const index = this.tamu.findIndex(tamu => tamu.id === id) // find the post index
                        if (~index) {
                            // if the post exists in array
                            this.tamu.splice(index, 1)
                        }

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            }



            //return
            return {
                tamu,
                tamuDelete
            }

        }

    }
</script>

<style>
    body {
        background: lightgray;
    }
</style>