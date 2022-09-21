export const init = () => {
  const deleteButton = document.getElementById("local_student--delete");
  deleteButton.addEventListener("click", () => {
    alert("You clicked the Delete Button!");
  });
};
