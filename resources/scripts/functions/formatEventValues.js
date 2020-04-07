"use_strict";

const formatEventValues = event => {
  const date = new Date(`${event.acf.date}`);

  const dayOfMonth = date.getDate();
  const title = event.title.rendered;
  const performer = event.acf.performer;
  const eventLink = event.link;
  const ticketLink = event.acf.ticket_link;
  const image = event.acf.image;
  const time = `${date.getHours()}:${String(date.getMinutes()).padStart(
    2,
    "0"
  )}`;

  let month = "månad";

  switch (date.getMonth()) {
    case 0:
      month = "januari";
      break;
    case 1:
      month = "februari";
      break;
    case 2:
      month = "mars";
      break;
    case 3:
      month = "april";
      break;
    case 4:
      month = "maj";
      break;
    case 5:
      month = "juni";
      break;
    case 6:
      month = "juli";
      break;
    case 7:
      month = "augusti";
      break;
    case 8:
      month = "september";
      break;
    case 9:
      month = "oktober";
      break;
    case 10:
      month = "november";
      break;
    case 11:
      month = "december";
      break;
    default:
      month = "månad";
  }

  let weekDay = "DAG";

  switch (date.getDay()) {
    case 0:
      weekDay = "MÅN";
      break;
    case 1:
      weekDay = "TIS";
      break;
    case 2:
      weekDay = "ONS";
      break;
    case 3:
      weekDay = "TOR";
      break;
    case 4:
      weekDay = "FRE";
      break;
    case 5:
      weekDay = "LÖR";
      break;
    case 6:
      weekDay = "SÖN";
      break;
    default:
      weekDay = "DAG";
  }

  const values = {
    image: image,
    day: dayOfMonth,
    time: time,
    month: month,
    weekDay: weekDay,
    title: title,
    performer: performer,
    eventLink: eventLink,
    ticketLink: ticketLink
  };

  return values;
};

export default formatEventValues;
