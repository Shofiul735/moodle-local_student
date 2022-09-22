import $ from "jquery";
import ModalFactory from "core/modal_factory";
import ModalEvents from "core/modal_events";
import { get_string } from "core/str";

export const init = async () => {
  let api_key;
  await get_string("api_token", "local_student").then((data) => {
    api_key = data;
  });
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
          wstoken: api_key,
          wsfunction,
          moodlewsrestformat: "json",
        };
        url.search = new URLSearchParams(params).toString();
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
            window.location.reload();
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
