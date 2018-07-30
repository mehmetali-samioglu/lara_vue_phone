<template>
    <div class="modal " :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Listeye Ekle</p>
                <button class="delete" @click="close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="liste.name">
                    </div>
                    <small class="has-text-danger" v-if="errors.name ">{{ errors.name[0] }}</small>
                </div>
                <div class="field">
                    <label class="label">Number</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.phone}" type="number"   placeholder="Phone" v-model="liste.phone">
                    </div>
                    <small class="has-text-danger" v-if="errors.phone" >{{ errors.phone[0] }}</small>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input"  :class="{'is-danger': errors.email}" type="email" placeholder="E-Mail" v-model="liste.email">
                    </div>
                    <small class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="save" >Ekle</button>
                <button class="button" @click="close">İptal</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default{
        props:['openmodal'],
        data(){
            return{
                liste:{
                    name : '',
                    phone : '',
                    email : ''
                },
                errors:{ }
            }
        },
        methods:{
            close(){
                this.$emit('closeRequest'); // $emit=türkçe yaymak, yayar anlamındadır.
            },
            save(){
                axios.post('/phonebook',  this.$data.liste  )
                    .then((response) =>   {
                        this.close();
                        this.liste.name=this.liste.phone=this.liste.email='';  // this.list='' da olabilir
                        this.$parent.lists.push(response.data); //yeni ekleneni tabloya nında ekler
                        this.$parent.lists.sort(function(a,b){
                           if(a.name > b.name){
                               return 1;
                           }else if( a.name < b.name){
                               return -1;
                            }
                        });
                    })
                    .catch((error) =>   this.errors = error.response.data.errors)
            }
        }
    }
</script>