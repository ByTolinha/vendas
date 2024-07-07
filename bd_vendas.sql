create database vendas;
use vendas;

create table tb_responsavel(
cd_responsavel int primary key auto_increment,
nm_responsavel text
);
create table tb_forma_pag(
cd_forma_pag int primary key auto_increment,
nm_forma_pag char(50)
);
create table tb_categoria(
cd_categoria int primary key auto_increment,
nm_categoria char(50)
);
create table tb_nivel(
cd_nivel int primary key auto_increment,
nm_nivel char(50)
);
create table tb_usuario(
cd_usuario int primary key auto_increment,
ds_login varchar(100),
ds_senha varchar(100),
id_responsavel int,
id_nivel int
);
create table tb_lancamento(
cd_lancamento int primary key auto_increment,
ds_lancamento varchar(100),
dt_lancamento date,
nr_parcela_atual int,
nr_parcela_total int,
vl_lancamento decimal(7,2),
id_responsavel int,
id_forma_pag int,
id_categoria int,
id_usuario int
);

alter table tb_usuario add
foreign key fk_usuario_responsavel(id_responsavel)
references tb_responsavel(cd_responsavel);

alter table tb_usuario add
foreign key fk_usuario_nivel(id_nivel)
references tb_nivel(cd_nivel);

alter table tb_lancamento add
foreign key fk_lancamento_responsavel(id_responsavel)
references tb_responsavel(cd_responsavel);

alter table tb_lancamento add
foreign key fk_lancamento_forma_pag(id_forma_pag)
references tb_forma_pag(cd_forma_pag);

alter table tb_lancamento add
foreign key fk_lancamento_categoria(id_categoria)
references tb_categoria(cd_categoria);

alter table tb_lancamento add
foreign key fk_lancamento_usuario(id_usuario)
references tb_usuario(cd_usuario);







