<template>
        <tile :position="position" v-bind:class="user.classed">
            <section class="employee">
                <h1 class="employee__title">{{ employee }}</h1>
            </section>
        </tile>

</template>

<script>
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import axios from 'axios';

export default{

    components: {
        Tile
    },

    mixins : [echo],

    props : ['employee','position','email','id'],

    data(){
        return {
            user : {
                classed : 'online',
                status_bool : true
            }
        }
    },

    methods : {

        getStatus : function(id){

            axios.get('/users/' + id + '/status').then((response) => {
                this.user = response.data;
                this.getStatusClass(this.user);
            },(response) => {
                this.user = {class : 'offline', status_bool : true}
            })

        },


        getStatusClass : function(user){
            this.user.classed = 'employee__' + user.status_bool != undefined && user.status_bool == true ? 'online' : 'offline';
        }

    },


    mounted() {

        setInterval(this.getStatus(this.id),3000);
    }



};

</script>