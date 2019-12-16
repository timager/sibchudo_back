import React, {Component} from "react";
import './TitleDescription.css';
import Button from "../../../../BaseElements/Button/Button";

class TitleDescription extends Component {
    render() {
        return (
            <div className={'green_rectangle'}>
                <div>
                    <div>Коллективный питомник</div>
                    <div>сибирских кошек в Петербурге</div>
                    <div className={'register_description'}>Регистрация FIFE и WCF</div>
                    <Button color={'white'}>Оставить заявку на котенка</Button>
                </div>
            </div>
        );
    }
}

export default TitleDescription;