
<?php if (isset($_SESSION['username'])): ?>
    <?php $fullname = explode(" ", $_SESSION['username']); ?>
    <?php $name = end($fullname); ?>
<?php endif; ?>
<div class="chatbox">
    <div class="chatbox-icon">
        <i class="fa-solid fa-headset"></i>
    </div>
    <div style="display:none" class="chatbox-container">
        <div class="chatbox-header">
            <h5>Chat Box</h5>
            <button><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div id="chat-log">
            <div class="message ai">
                <span><?= isset($name) && $name ? "Hello " . htmlspecialchars($name,ENT_QUOTES,'UTF-8'). ", What do you want to help ?" : "hello, please login" ?></span>
            </div>
        </div>
        <form onsubmit="sendMessage(event)" id="input-area">
            <input type="text" id="user-input" placeholder="Enter questions...">
            <button type="submit">Send</button>
        </form>
    </div>
    <script>
        const chatboxIcon = document.querySelector('.chatbox-icon')
        const container = document.querySelector('.chatbox-container')
        chatboxIcon.addEventListener('click', function(){
            this.style.display = 'none'
            container.style.display = 'block'

        })

        document.querySelector('.chatbox-header button').
        addEventListener('click',function(){
            chatboxIcon.style.display = 'flex'
            container.style.display = 'none'
        })

    </script>
    <script>
    const chatLog = document.getElementById("chat-log");

    function appendMessage(sender, text) {
      const div = document.createElement("div");
      div.classList.add("message", sender);
      div.innerHTML = `<span>${text}</span>`;
      chatLog.appendChild(div);
      chatLog.scrollTop = chatLog.scrollHeight; // Tự cuộn xuống
    }

    async function sendMessage(e) {
        e.preventDefault();
      const input = document.getElementById("user-input");
      const message = input.value.trim();
      if (message === "") return;

      appendMessage("user", message);
      input.value = "";

      appendMessage("ai", "...");

      const res = await fetch("/The-Ordinary/chatbox", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ message })
      });

      const data = await res.json();
      console.log(data)

      // Xóa "Đang trả lời..."
      const aiMessages = document.querySelectorAll(".ai span");
      aiMessages[aiMessages.length - 1].remove();

      appendMessage("ai", data.reply);
    }
  </script>
</div>