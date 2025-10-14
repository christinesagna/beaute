<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
body {
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin: 0;
    padding: 0;
    min-height: 100vh;
}

.page-content {
    margin-left: 10px;
    padding: 40px 20px;
    background: transparent;
    min-height: 100vh;
    position: relative;
}

.page-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    z-index: -1;
}

.div_center {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    padding: 50px 40px;
    border-radius: 25px;
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.15),
        0 0 0 1px rgba(255, 255, 255, 0.2);
    color: #2c3e50;
    position: relative;
    overflow: hidden;
}

.div_center::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
    background-size: 300% 100%;
    animation: gradient 3s ease infinite;
}

@keyframes gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.div_center h1 {
    margin-bottom: 45px;
    font-size: 32px;
    font-weight: 700;
    color: #2c3e50;
    text-align: center;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.div_center h1::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
}

.div-deg {
    margin-bottom: 30px;
    position: relative;
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
    transform: translateY(20px);
}

.div-deg:nth-child(2) { animation-delay: 0.1s; }
.div-deg:nth-child(3) { animation-delay: 0.2s; }
.div-deg:nth-child(4) { animation-delay: 0.3s; }
.div-deg:nth-child(5) { animation-delay: 0.4s; }
.div-deg:nth-child(6) { animation-delay: 0.5s; }
.div-deg:nth-child(7) { animation-delay: 0.6s; }
.div-deg:nth-child(8) { animation-delay: 0.7s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

label {
    display: block;
    margin-bottom: 12px;
    font-weight: 600;
    color: #34495e;
    font-size: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
}

label::before {
    content: '';
    position: absolute;
    left: -15px;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 20px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 2px;
}

input[type="text"],
input[type="number"],
select,
textarea,
input[type="file"] {
    width: 100%;
    padding: 18px 20px;
    border: 2px solid #e8ecf0;
    border-radius: 15px;
    background-color: #ffffff;
    color: #2c3e50;
    font-size: 16px;
    font-weight: 500;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-sizing: border-box;
    position: relative;
}

input[type="file"] {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px dashed #667eea;
    padding: 25px;
    text-align: center;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

input[type="file"]::before {
    content: '📁 Glisser-déposer ou cliquer pour sélectionner';
    display: block;
    color: #667eea;
    font-weight: 600;
    margin-bottom: 8px;
}

input:focus,
textarea:focus,
select:focus {
    border-color: #667eea;
    outline: none;
    background-color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 
        0 10px 25px rgba(102, 126, 234, 0.15),
        0 0 0 3px rgba(102, 126, 234, 0.1);
}

input:hover,
textarea:hover,
select:hover {
    border-color: #667eea;
    transform: translateY(-1px);
}

textarea {
    resize: vertical;
    min-height: 140px;
    font-family: inherit;
    line-height: 1.6;
}

select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23667eea' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 1rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 3rem;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 20px 40px;
    color: white;
    font-weight: 700;
    font-size: 18px;
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    width: 100%;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #5a67d8 0%, #667eea 100%);
}

.btn-primary:active {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

/* Animation d'entrée pour le formulaire */
form {
    animation: slideInFromBottom 0.8s ease-out;
}

@keyframes slideInFromBottom {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive design amélioré */
@media (max-width: 768px) {
    .div_center {
        margin: 20px;
        padding: 30px 25px;
        border-radius: 20px;
    }
    
    .div_center h1 {
        font-size: 26px;
        margin-bottom: 35px;
    }
    
    .page-content {
        padding: 20px 10px;
    }
    
    label::before {
        display: none;
    }
    
    input[type="text"],
    input[type="number"],
    select,
    textarea,
    input[type="file"] {
        padding: 15px;
        font-size: 15px;
    }
}

/* Effet de survol pour les champs */
.div-deg {
    position: relative;
}

.div-deg::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
    transition: width 0.4s ease;
}

.div-deg:focus-within::after {
    width: 100%;
}
</style>

  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')
    
   <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div>
                <div class="div_center">
                    <h1 style="font-size: 30px; font-weight: bold; ">ajouter des services</h1>
               <form action="{{ url('ajoute_service') }}" method="post" enctype="multipart/form-data">
                   @csrf
                 <div class="div-deg">
                    <label>nom service</label>
                    <input type="text" name="Nom">
                 </div>
                  <div class="div-deg">
                    <label>description</label>
                    <textarea name="description"></textarea>
                 </div>
                  
                  <div class="div-deg">
                    <label>prix</label>
                    <input type="number" name="Prix">
                 </div>
                  <div class="div-deg">
                    <label>type service</label>
                    <select name="type">
                        <option selected value="regular">Régulier</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                  </div>
                 <div class="div-deg">
                <label>Wifi Gratuit</label>
                <select name="Wifi">
                    <option selected value="yes">Oui</option>
                     <option value="no">Non</option>
                  </select>
                    </div>
                     <div class="div-deg">
  <label>Télécharger une image</label>
  <input type="file" name="image">
</div>
<div class="div-deg">
  <input  class="btn btn-primary"type="submit" value="service salon">
</div>
</form>
</div>
</div>
</div>
</div>


</body>
</html>
