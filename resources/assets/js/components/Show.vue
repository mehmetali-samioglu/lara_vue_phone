<template>
    <div class="modal " :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">{{gelen_data_listesi.name }} Detayları</p>
                <button class="delete" @click="close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <li class="panel-block">
                    <label class="column is-2"><b>Adı: </b></label> {{gelen_data_listesi.name }}
                </li>
                <li class="panel-block">
                    <label class="column is-2"><b>Telefon: </b></label> {{gelen_data_listesi.phone }}
                </li>
                <li class="panel-block">
                    <label class="column is-2"><b>EMail: </b></label> {{gelen_data_listesi.email }}
                </li>


            </section>
            <footer class="modal-card-foot">
                <button class="button" @click="close">İptal</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props:['openmodal'],
        data(){
            return{
                gelen_data_listesi: ''
            }
        },
        methods:{
            close(){
                this.$emit('closeRequest'); // $emit=türkçe yaymak, yayar anlamındadır.
            }
        }
    }
</script>
