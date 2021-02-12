<template>
  <div class="form-container">
    <input
      id="btn-input"
      type="text"
      name="message"
      placeholder="Type your message here..."
      v-model="newMessage"
      @keyup.enter="sendMessage"
    />

    <span>
      <button class="my-button-send" id="btn-chat" @click="sendMessage">
        Send
      </button>
    </span>
  </div>
</template>

<script>
export default {
  props: ["user"],

  data() {
    return {
      newMessage: "",
    };
  },

  methods: {
    sendMessage() {
      this.$emit("messagesent", {
        user: this.user,
        message: this.newMessage,
      });

      this.newMessage = "";
    },
  },
};
</script>

<style scoped>
.form-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.form-container input {
  height: 50px;
  width: 100%;
  outline: none;
  border: 1px solid #ccc;
  padding-left: 15px;
}

.my-button-send {
  border: none;
  background: #555;
  color: #ffffff;
  width: 100%;
  height: 50px;
  padding: 15px 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
