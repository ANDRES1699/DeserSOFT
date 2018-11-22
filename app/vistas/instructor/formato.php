<div id="sena">
		<img id="logo" src="logosenatext.png">
				<div id="text">
					<label>REPORTE DE DESERCIÓN</label><br>
					<label>F-19-08-9210 V. 1</label><br>
					<label>EJECUCIÓN DE LA FORMACIÓN PROFESIONAL</label>
				</div>
			</div>

			<div id="sena1">
				<label>Nombre del aprendiz:<?=$cPD->nombres.''.$cPD->apellidos;?></label><br>
				<label>Documento de identidad:<?=$cPD->Tip_doc;?></label>
				<label id="seg">No.<?=$cPD->num_documento;?></label><br>
				<label>Programa de Formación:<?=$cPD->nom_programa;?></label><br>
				<label>Ficha Caracterización Sofíaplus:<?=$cPD->num_ficha;?></label><br>
				<label>Competencia que cursa:<?=$cPD->nom_competencia;?></label>
				<label id="seg">Trimestre que cursa:<?=$cPD->num_trimestre;?></label><br>
				<label>Fecha reporte:<?=$cPD->fecha_reporte;?></label><br>
				<label>Primer fecha:<?=$cPD->fecha_desercion1;?></label><br>
				<label>Segunda fecha:<?=$cPD->fecha_desercion2;?></label><br>
				<label>Tercera fecha:<?=$cPD->fecha_desercion3;?></label><br>
			<div id="causas">	
				<label>CAUSAS DE DESERCIÓN</label><br>
                <h1><?=$cPD->nombre;?></h1><br>
			</div>	
			<div id="observaciones">
				<label>Observaciones:</label><br>
                <h1><?=$cPD->observaciones;?></h1><br>
			</div>	
				<label>VERIFICACIÓN DE REPORTE:</label>
				<label id="seg1">Estado en Sofía:</label><br><br>
				<label>Fecha verificación:</label><br><br>
				<label>Nota: Anexar la notificación de la deserción, enviada por correo al aprendiz.</label><br>
				<br>
				<br>
				<br>
				<br>
				<label id="border">Nombre y firma instructor</label>
				<label id="border">Nombre y firma vocero del Grupo</label><br><br><br><br><br>
				<label id="border">Nombre y firma instructor</label>
				<label id="border">Nombre y firma responsable de seguimiento aprendices</label><br><br><br><br><br>
				<label id="border">Vo.Bo, Coordinador académico</label><br><br><br>
				<label>ACTA No.</label>
				<label id="seg">FECHA:</label><br>
			</div>