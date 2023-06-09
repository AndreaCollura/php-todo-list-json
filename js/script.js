const { createApp } = Vue;

createApp({
    data() {
        return {
            shoppingList: [],
            newListEle: "",
            apiUrl: "server.php",
            error: false,
        };
    },
    methods: {
        catchList() {
            axios.get(this.apiUrl).then((res) => {
                this.shoppingList = res.data;
                console.log(res.data);
            });
        },
        addListEle() {
            if (this.newListEle === "") {
                this.error = true;
                return;
            }

            const element = {
                newListEle: {
                    text: this.newListEle,
                    /* done: false, */
                },
            };
            axios
                .post(this.apiUrl, element, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then((res) => {
                    this.newListEle = "";
                    console.log(res.data);
                    this.shoppingList = res.data;
                });
        },

        confirmProduct(index) {
            const element = {
                updateElem: index,
            };

            axios
                .post(this.apiUrl, element, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then((res) => {
                    console.log(res.data);
                    this.shoppingList = res.data;
                });

            this.shoppingList[index].done = !this.shoppingList[index].done;
        },

        deleteProduct(index) {
            const element = {
                deleteElem: index,
            };

            axios
                .post(this.apiUrl, element, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then((res) => {
                    console.log(res.data);
                    this.shoppingList = res.data;
                });

            
        },
    },
    mounted() {
        this.catchList();
    },
}).mount("#app");
