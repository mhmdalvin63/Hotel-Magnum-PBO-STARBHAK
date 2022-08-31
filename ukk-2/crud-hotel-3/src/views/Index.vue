<template>
    .<div class="container">
        <div class="isi">
            <div class="content">
                <router-link id="tamu" :to="{name: 'tamu.index-tamu'}" class="btn btn-outline-primary btn-lg btn-block">TAMU</router-link>
                <router-link id="kamar" :to="{name: 'kamar.index-kamar'}" class="btn btn-md btn-outline-success btn-lg btn-block">KAMAR</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'index-home',
    }
</script>

<style>
    #tamu{
        margin-right: 20px;
    }
    .isi{
        text-align: center;
        background-color: rgb(194, 192, 192);
        height: 90vh;
        border: 3px solid rgb(194, 192, 192);
        border-radius: 50px;
    }
    .content{
        margin-top: 25%;
    }
</style>