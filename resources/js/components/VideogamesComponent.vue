<template>
    <div id="container">
        <h1>Videogames List</h1>
        <div class="videogame-cont" v-for="videogame in videogames" :key="videogame.id">
            <h3>{{videogame.title}}</h3>
            <div v-if="user" class="trash"><i @click="deleteVideogame(videogame.id)" class="fas fa-trash"></i></div>
            <span>{{videogame.subtitle}}</span>
            <h5>Company: {{videogame.editor}}</h5>
            <span v-if="(videogame.ratings)">Ratings: {{videogame.ratings}}</span>
            
        </div>
        

    </div>
</template>
<script>
export default {
    
    data(){
        return {
            videogames: [] 
        }
    },
    props: {
        user: String
    },
    methods: {
        deleteVideogame(id) {
            const self = this;
            axios.get(`/api/videogame/delete/${id}`)
                .then(res => {
                    const index = self.getIndexById(id);
                    self.videogames.splice(index, 1);
                })
                .catch(err=> console.error(err));

        },
        
        getIndexById(id) {
            for(let x=0; x<this.videogames.length; x++){
                const videogame = this.videogames[x];
                if(videogame.id == id)
                    return x;
            }
        }
    },
    mounted() {
        axios.get('/api/videogames/list')
            .then(res => this.videogames = res.data )
            .catch(err => console.error(err));

        
    }

}
</script>
<style lang="scss" scoped="scss">
#container {
    width: 60%;
    margin: 0 auto;
}
.videogame-cont {
    position: relative;
    margin: 15px auto;
    border: 2px solid black;
    text-align: center;
    .trash {
        position: absolute;
        top: 0;
        right: 10px;
    }
}

</style>