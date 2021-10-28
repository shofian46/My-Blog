<template>
    <div class="container">
        <div id="success" class="mb-3"></div>

        <a style="cursor: pointer" @click.prevent="dislikeposts">
            <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
            ({{ allDislike }})
        </a>
    </div>
</template>

<script>
export default {
    props: ["posts"],
    data() {
        return {
            allDislike: "",
        };
    },
    methods: {
        dislikePosts() {
            axios
                .posts("/dislike/" + this.posts, { posts: this.posts })
                .then((res) => {
                    this.renderDislike();
                    $("#success").html(res.data.message);
                })
                .catch();
        },
        renderDislike() {
            axios.posts("/dislike", { posts: this.posts }).then((res) => {
                console.log(res.data.posts.dislike);
                this.allDislike = res.data.posts.dislike;
            });
        },
    },
    mounted() {
        this.renderDislike();
    },
};
</script>
