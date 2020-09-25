import React, { Component } from 'react';
import Logo from '../../assets/images/logo.png';

class Register extends Component {
    render() {
        return (
            <div className="register-box">
                 <div className="login-logo">
                    <img src={Logo} alt="Logo UFJF" className="img-fluid" />
                </div>
                <div className="card">
                    <div className="card-body register-card-body">
                        <p className="login-box-msg">Cadastre-se</p>
                        <form>
                            <div className="input-group mb-3">
                                <input type="text" className="form-control" placeholder="Nome completo" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="input-group mb-3">
                                <input type="email" className="form-control" placeholder="E-mail" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="input-group mb-3">
                                <input type="password" className="form-control" placeholder="Senha" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="input-group mb-3">
                                <input type="password" className="form-control" placeholder="Confirme sua senha" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" />
                                <label for="agreeTerms" className="ml-1">
                                    Eu concordo com os <a href="#">termos</a>
                                </label>
                            </div>
                            <div className="row">
                                <div className="col-8">
                                </div>
                                <div className="col-4">
                                    <button type="button" className="btn btn-primary btn-block">Registrar</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <a href="/login" className="text-center">Já tenho uma conta</a>
                    </div>
                </div>
            </div>
        );
    }
}

export default Register;