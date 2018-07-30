<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                Phonebok App
                <button @click="openAdd()" class="button is-success is-outlined ">Yeni Ekle</button>
                <span class="is-pulled-right" v-if="loading">
                    <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                </span>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="Ara" v-model="searchQuery">
                    <span class="icon is-small is-left">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </p>
            </div>
            <a class="panel-block is-active" v-for="item,key in temp">
                <span class="is-9 column">
                    {{item.name}} - {{item.email}}
                </span>

                <span class="panel-icon is-1 column">
                  <i class=" has-text-danger fa fa-trash " aria-hidden="true" @click="del(key,item.id)"></i>
                </span>
                <span class="panel-icon is-1 column">
                  <i class="has-text-info fa fa-edit " aria-hidden="true" @click="openUpdate(key)"></i>
                </span>
                <span class="panel-icon is-1 column">
                  <i class="has-text-danger fa fa-eye " @click="openShow(key)" aria-hidden="true"></i>
                </span>
            </a>
        </nav>
        <!--Add.vue require edildi ve compoenent olarak eklendi.-->
        <Add :openmodal="addActive" @closeRequest="close"></Add>

        <Show :openmodal="showActive" @closeRequest="close"></Show>

        <Update :openmodal="updateActive" @closeRequest="close"></Update>

    </div>

</template>

<script>

    let Add =   require('./Add.vue');
    let Show =   require('./Show.vue');
    let Update =   require('./Update.vue');

    export default{
        components:{Add,Show,Update},
        data(){
            return{
                addActive : '',
                showActive:'',
                updateActive:'',
                lists:{},
                errors:{},
                loading:false,
                searchQuery : '',
                temp:''
            }
        },
        watch:{
            searchQuery(){
                if(this.searchQuery.length > 0){
                    this.temp = this.lists.filter((item) => {
                        return Object.keys(item).some((key)=>{
                            let string = String(item[key]);
                            return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1

                        });
                        //aşağıdaki sadece name alanında arama yapmamızı sağlar
                       // return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                    });
                }else{
                    this.temp = this.lists;
                }
            }
        },
        mounted(){
            axios.post('/getData')
                .then((response) =>   this.lists = this.temp = response.data)
                .catch((error) =>   this.errors = error.response.data.errors)
        },
        methods:{
            openAdd(){
                this.addActive ='is-active';
            },
            openShow(key){
                this.$children[1]. gelen_data_listesi = this.temp[key]
                this.showActive ='is-active';
            },
            openUpdate(key){
                this.$children[2]. update_edilecek_data = this.temp[key]
                this.updateActive ='is-active';
            },
            close(){
                this.addActive = this.showActive =this.updateActive =  ''
            },
            del(key,id) {
                console.log(`${key},${id}`);
                if(confirm("Silmek İstediğinize Emin misiniz?")){
                    this.loading=!this.loading;
                    axios.delete(`/phonebook/${id}`)
                        .then((response) =>   {this.lists.splice(key,1),this.loading=!this.loading} )
                            .catch((error) =>   this.errors = error.response.data.errors)
                    this.loading=true;
                }
                console.log(`${key},${id}`);

            }
        }
    }
</script>