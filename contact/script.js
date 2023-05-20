const textarea = document.getElementById("message");
const wordCount = document.getElementById("character-count");

textarea.addEventListener("input", function () {
  const message = textarea.value;
  const currentCount = message.length;
  const remainingCount = 300 - currentCount;

  wordCount.textContent = `Character limit: ${currentCount}/301`;

  if (remainingCount < 0) {
    textarea.value = message.substring(0, 300);
  }

  if (remainingCount <= 0) {
    wordCount.classList.add("limit-reached");
  } else {
    wordCount.classList.remove("limit-reached");
  }
});
