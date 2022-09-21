import $ from "jquery";
//import Ajax from "core/ajax";
import ModalFactory from "core/modal_factory";
import ModalEvents from "core/modal_events";
//import Notification from "core/notification";

export const init = () => {
  $(".local_student--delete").on("click", (e) => {
    let id = Number.parseInt(e.target.text.split("-")[1]);

    ModalFactory.create({
      type: ModalFactory.types.SAVE_CANCEL,
      title: "Confirm delete",
      body: "Do you want to delete this record?",
    }).then((modal) => {
      modal.setSaveButtonText("Delete");
      let root = modal.getRoot();

      root.on(ModalEvents.save, () => {
        let wsfunction = "local_student_delete";

        let url = new URL("http://localhost/moodle/webservice/rest/server.php");
        let params = {
          id,
          wstoken: "4a657cdb29cf703b5a81c08e9a3a7c2b",
          wsfunction,
          moodlewsrestformat: "json",
        };
        url.search = new URLSearchParams(params).toString();
        console.log(url);
        fetch(url, {
          method: "GET",
        })
          .then((respose) => {
            if (!respose.ok) {
              throw Error("Database operation failed!");
            }
            return respose.json();
          })
          .then((data) => {
            console.log(data);
            window.location.href = $(location).attr("href");
            return data;
          })
          .catch((e) => {
            alert(e.message);
          });
      });
      modal.show();
    });
  });
};
