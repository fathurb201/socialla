<template>
    <div>
        <pre class="">{{products}}</pre>
        <!-- <pre>{{product_gallery.length}}</pre> -->
        <!-- <span v-for="product in products" :key="product.id">
            <img v-for="gallery in product.product_gallery" :key="gallery.id" width="200px" :src="gallery.image" alt="">
        </span> -->

        <div v-for="product in products" :key="product.id" class="card">
            <img v-for="gallery in product.product_gallery" :key="gallery.id" width="200px" :src="gallery.image" alt="">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            src: '',
            products: '',
            // product_gallery: ''
        }
    },
    methods: {
        getProduct() {
            this.axios.get('product').then(response => {
                this.products =  response.data;
                // this.product_gallery = products
            }).catch(error => {
                console.log(error);
            })
        }
    },
    mounted() {
        this.getProduct();
    }
}
</script>

<style>

</style>