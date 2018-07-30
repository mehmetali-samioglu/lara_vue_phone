<template>
    <div class="modal " :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">{{update_edilecek_data.name}} Detaylarını Güncelle</p>
                <button class="delete" @click="close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="update_edilecek_data.name">
                    </div>
                    <small class="has-text-danger" v-if="errors.name ">{{ errors.name[0] }}</small>
                </div>
                <div class="field">
                    <label class="label">Number</label>
                    <div class="control">
                        <input class="input" :class="{'is-danger':errors.phone}" type="number"   placeholder="Phone" v-model="update_edilecek_data.phone">
                    </div>
                    <small class="has-text-danger" v-if="errors.phone" >{{ errors.phone[0] }}</small>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input"  :class="{'is-danger': errors.email}" type="email" placeholder="E-Mail" v-model="update_edilecek_data.email">
                    </div>
                    <small class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="update" >Güncelle</button>
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
                update_edilecek_data:{ },
                errors:{ }
            }
        },
        methods:{
            close(){
                this.$emit('closeRequest'); // $emit=türkçe yaymak, yayar anlamındadır.
            },
            update(){
                axios.patch(`/phonebook/${this.update_edilecek_data.id}`,  this.$data.update_edilecek_data  )
                    .then((response) =>  {
                        this.close()
                    })
                    .catch((error) =>   this.errors = error.response.data.errors)
            }
        }
    }
</script>