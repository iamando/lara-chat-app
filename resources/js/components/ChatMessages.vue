<template>
  <ul class="chat">
    <li class="clearfix" v-for="message in messages" v-bind:key="message.id">
      <div class="chat-body clearfix">
        <div class="container-msg">
          <div class="header">
            <strong class="primary-font">
              {{ message.user.name }}
            </strong>
          </div>
          <p>
            {{ message.message }}
          </p>
        </div>
        <!-- <div class="container-btn" v-if="">
          <button @click="deleteMessage" class="delete-button">X</button>
        </div> -->
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  props: ["messages"],

  //   data() {},

  methods: {
    deleteMessage() {
      this.$emit("deletemsg", {
        message: this.message,
      });
    },
  },
};
</script>

<style scoped>
.chat {
  list-style: none;
  margin: 0;
  padding: 0;
  margin-bottom: 4rem;
}

.chat li {
  margin-bottom: 10px;
  padding-bottom: 5px;
  border-bottom: 1px dotted #b3a9a9;
}

.chat li .chat-body p {
  margin: 0;
  color: #777777;
}
.chat li {
  border: 1px solid #ccc;
  padding: 15px;
  height: 75px;
}

.chat-body {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.container-msg {
  display: flex;
  flex-direction: column;
  align-content: center;
  width: 90%;
}

.container-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 10%;
}

.container-btn button {
  background: red;
  border: none;
  color: #fff;
  outline: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  padding: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
</style>

