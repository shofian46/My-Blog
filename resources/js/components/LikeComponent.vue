<template>
    <div class="container">
        <div id="success" class="mb-3"></div>

        <a style="cursor: pointer" @click.prevent="likeposts">
            <i class="far fa-heart" aria-hidden="true"></i>
            ({{ alllikes }})
        </a>
    </div>
</template>

<script>
export default {
    props: ["posts"],
    data() {
        return {
            alllikes: "",
        };
    },
    methods: {
        likePosts() {
            axios
                .posts("/like/" + this.posts, {
                    posts: this.posts,
                })
                .then((res) => {
                    this.renderLike();
                    $("#success").html(res.data.message);
                })
                .catch();
        },
        renderLike() {
            axios
                .posts("/like", {
                    posts: this.posts,
                })
                .then((res) => {
                    console.log(res.data.posts.like);
                    this.alllikes = res.data.posts.like;
                });
        },
    },
    mounted() {
        this.renderLike();
    },
};
</script>
