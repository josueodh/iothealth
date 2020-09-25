import React, { Component } from 'react';
import Logo from '../../assets/images/logo.png';

class Reset extends Component {
    render() {
        return (
            <div className="login-box">
                <div className="login-logo">
                    <img src={Logo} alt="Logo UFJF" className="img-fluid" />
                </div>
                <div className="card">
                    <div className="card-body login-card-body">
                        <p className="login-box-msg">Esqueceu sua senha? Aqui você pode solicitar uma nova.</p>

                        <form action="recover-password.html" method="post">
                            <div className="input-group mb-3">
                                <input type="email" className="form-control" placeholder="Email" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-12">
                                    <button type="button" className="btn btn-primary btn-block">Solicitar nova senha</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <p className="mt-3 mb-1">
                            <a href="/login">Login</a>
                        </p>
                        <p className="mb-0">
                            <a href="/register" className="text-center">Já tenho uma conta</a>
                        </p>
                    </div>
                </div>
            </div>
        );
    }
}

export default Reset;