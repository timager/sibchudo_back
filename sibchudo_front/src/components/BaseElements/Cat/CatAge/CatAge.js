import React, {Component} from "react";
import Moment from 'react-moment';
import 'moment-timezone';

class CatAge extends Component {
    render() {
        if (this.props.birthday === null) {
            return "Загрузка...";
        }
        return (
            <span>
                <Moment format={"L"} date={this.props.birthday} locale={"ru"}/> (<Moment fromNow ago
                                                                                         date={this.props.birthday}
                                                                                         locale="ru"/>)
            </span>
        );
    }
}

export default CatAge;