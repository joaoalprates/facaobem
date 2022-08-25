USE [master]
GO
/****** Object:  Database [facaobem]    Script Date: 24/08/2022 23:59:48 ******/
CREATE DATABASE [facaobem]
 CONTAINMENT = NONE
 ON  PRIMARY
( NAME = N'facaobem', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\facaobem.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON
( NAME = N'facaobem_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\facaobem_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [facaobem] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [facaobem].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [facaobem] SET ANSI_NULL_DEFAULT OFF
GO
ALTER DATABASE [facaobem] SET ANSI_NULLS OFF
GO
ALTER DATABASE [facaobem] SET ANSI_PADDING OFF
GO
ALTER DATABASE [facaobem] SET ANSI_WARNINGS OFF
GO
ALTER DATABASE [facaobem] SET ARITHABORT OFF
GO
ALTER DATABASE [facaobem] SET AUTO_CLOSE OFF
GO
ALTER DATABASE [facaobem] SET AUTO_SHRINK OFF
GO
ALTER DATABASE [facaobem] SET AUTO_UPDATE_STATISTICS ON
GO
ALTER DATABASE [facaobem] SET CURSOR_CLOSE_ON_COMMIT OFF
GO
ALTER DATABASE [facaobem] SET CURSOR_DEFAULT  GLOBAL
GO
ALTER DATABASE [facaobem] SET CONCAT_NULL_YIELDS_NULL OFF
GO
ALTER DATABASE [facaobem] SET NUMERIC_ROUNDABORT OFF
GO
ALTER DATABASE [facaobem] SET QUOTED_IDENTIFIER OFF
GO
ALTER DATABASE [facaobem] SET RECURSIVE_TRIGGERS OFF
GO
ALTER DATABASE [facaobem] SET  DISABLE_BROKER
GO
ALTER DATABASE [facaobem] SET AUTO_UPDATE_STATISTICS_ASYNC OFF
GO
ALTER DATABASE [facaobem] SET DATE_CORRELATION_OPTIMIZATION OFF
GO
ALTER DATABASE [facaobem] SET TRUSTWORTHY OFF
GO
ALTER DATABASE [facaobem] SET ALLOW_SNAPSHOT_ISOLATION OFF
GO
ALTER DATABASE [facaobem] SET PARAMETERIZATION SIMPLE
GO
ALTER DATABASE [facaobem] SET READ_COMMITTED_SNAPSHOT OFF
GO
ALTER DATABASE [facaobem] SET HONOR_BROKER_PRIORITY OFF
GO
ALTER DATABASE [facaobem] SET RECOVERY FULL
GO
ALTER DATABASE [facaobem] SET  MULTI_USER
GO
ALTER DATABASE [facaobem] SET PAGE_VERIFY CHECKSUM
GO
ALTER DATABASE [facaobem] SET DB_CHAINING OFF
GO
ALTER DATABASE [facaobem] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF )
GO
ALTER DATABASE [facaobem] SET TARGET_RECOVERY_TIME = 60 SECONDS
GO
ALTER DATABASE [facaobem] SET DELAYED_DURABILITY = DISABLED
GO
EXEC sys.sp_db_vardecimal_storage_format N'facaobem', N'ON'
GO
ALTER DATABASE [facaobem] SET QUERY_STORE = OFF
GO
USE [facaobem]
GO
/****** Object:  Table [dbo].[coletas]    Script Date: 24/08/2022 23:59:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[coletas](
    [idColeta] [int] IDENTITY(1,1) NOT NULL,
    [idUsuario] [int] NOT NULL,
    [situacao] [int] NULL,
    [descricao] [text] NULL,
    [data1] [date] NULL,
    [turno1] [char](1) NULL,
    [data2] [date] NULL,
    [turno2] [char](1) NULL,
    [created_at] [datetime] NULL,
    [updated_at] [datetime] NULL,
    [deleted_at] [datetime] NULL,
    PRIMARY KEY CLUSTERED
(
[idColeta] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
    ) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
    GO
/****** Object:  Table [dbo].[instituicoes]    Script Date: 24/08/2022 23:59:48 ******/
    SET ANSI_NULLS ON
    GO
    SET QUOTED_IDENTIFIER ON
    GO
CREATE TABLE [dbo].[instituicoes](
    [idInstituicao] [int] IDENTITY(1,1) NOT NULL,
    [idUsuario] [int] NOT NULL,
    [nome] [varchar](255) NULL,
    [descricao] [text] NULL,
    [cnpj] [varchar](18) NULL,
    [situacao] [int] NULL,
    [logradouro] [varchar](255) NULL,
    [numero] [varchar](20) NULL,
    [complemento] [varchar](150) NULL,
    [cep] [varchar](9) NULL,
    [bairro] [varchar](255) NULL,
    [municipio] [varchar](255) NOT NULL,
    [estado] [varchar](2) NOT NULL,
    [telefone] [varchar](25) NULL,
    [created_at] [datetime] NULL,
    [updated_at] [datetime] NULL,
    [deleted_at] [datetime] NULL,
    PRIMARY KEY CLUSTERED
(
[idInstituicao] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
    ) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
    GO
/****** Object:  Table [dbo].[usuarios]    Script Date: 24/08/2022 23:59:48 ******/
    SET ANSI_NULLS ON
    GO
    SET QUOTED_IDENTIFIER ON
    GO
CREATE TABLE [dbo].[usuarios](
    [idUsuario] [int] IDENTITY(1,1) NOT NULL,
    [nome] [varchar](255) NULL,
    [email] [varchar](200) NULL,
    [senha] [varchar](50) NULL,
    [cpf] [varchar](15) NULL,
    [logradouro] [varchar](255) NULL,
    [numero] [varchar](20) NULL,
    [complemento] [varchar](150) NULL,
    [cep] [varchar](9) NULL,
    [bairro] [varchar](255) NULL,
    [municipio] [varchar](255) NOT NULL,
    [estado] [varchar](2) NOT NULL,
    [telefone] [varchar](25) NULL,
    [created_at] [datetime] NULL,
    [updated_at] [datetime] NULL,
    [deleted_at] [datetime] NULL,
    PRIMARY KEY CLUSTERED
(
[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
    ) ON [PRIMARY]
    GO
    SET IDENTITY_INSERT [dbo].[instituicoes] ON
    GO
    INSERT [dbo].[instituicoes] ([idInstituicao], [idUsuario], [nome], [descricao], [cnpj], [situacao], [logradouro], [numero], [complemento], [cep], [bairro], [municipio], [estado], [telefone], [created_at], [updated_at], [deleted_at]) VALUES (1, 3, N'Igreja', NULL, NULL, NULL, N'Rua Silva', N'90', NULL, N'91330-591', N'Azenha', N'Porto Alegre', N'RS', NULL, NULL, NULL, NULL)
    GO
    SET IDENTITY_INSERT [dbo].[instituicoes] OFF
    GO
    SET IDENTITY_INSERT [dbo].[usuarios] ON
    GO
    INSERT [dbo].[usuarios] ([idUsuario], [nome], [email], [senha], [cpf], [logradouro], [numero], [complemento], [cep], [bairro], [municipio], [estado], [telefone], [created_at], [updated_at], [deleted_at]) VALUES (3, N'João', N'ja.08@hotmail.com', N'1234', NULL, NULL, NULL, NULL, NULL, NULL, N'Porto Alegre', N'RS', NULL, NULL, NULL, NULL)
    GO
    SET IDENTITY_INSERT [dbo].[usuarios] OFF
    GO
ALTER TABLE [dbo].[coletas]  WITH CHECK ADD  CONSTRAINT [FK_coletas_usuarios] FOREIGN KEY([idUsuario])
    REFERENCES [dbo].[usuarios] ([idUsuario])
    GO
ALTER TABLE [dbo].[coletas] CHECK CONSTRAINT [FK_coletas_usuarios]
    GO
ALTER TABLE [dbo].[instituicoes]  WITH CHECK ADD  CONSTRAINT [FK_instituicoes_usuarios] FOREIGN KEY([idUsuario])
    REFERENCES [dbo].[usuarios] ([idUsuario])
    GO
ALTER TABLE [dbo].[instituicoes] CHECK CONSTRAINT [FK_instituicoes_usuarios]
    GO
    USE [master]
    GO
ALTER DATABASE [facaobem] SET  READ_WRITE 
GO
